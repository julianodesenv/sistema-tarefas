<?php

namespace AgenciaS3\Http\Controllers\System\SocialMedia;

use AgenciaS3\Criteria\FindByFromToDateCriteria;
use AgenciaS3\Criteria\FindByNameCriteria;
use AgenciaS3\Criteria\FindByStatusIdArrayCriteria;
use AgenciaS3\Criteria\SocialMedia\FindByPitCriteria;
use AgenciaS3\Criteria\SocialMedia\FindByServiceIdArrayCriteria;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\ClientUserRepository;
use AgenciaS3\Repositories\ServiceRepository;
use AgenciaS3\Repositories\SocialMediaPostRepository;
use AgenciaS3\Repositories\SocialMediaStatusRepository;
use AgenciaS3\Validators\SocialMediaPostValidator;
use Illuminate\Http\Request;


class ClientController extends Controller
{

    protected $repository;

    protected $validator;

    protected $clientRepository;

    protected $socialMediaStatusRepository;

    protected $serviceRepository;

    protected $clientUserRepository;

    public function __construct(SocialMediaPostRepository $repository,
                                SocialMediaPostValidator $validator,
                                ClientRepository $clientRepository,
                                SocialMediaStatusRepository $socialMediaStatusRepository,
                                ServiceRepository $serviceRepository,
                                ClientUserRepository $clientUserRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->clientRepository = $clientRepository;
        $this->socialMediaStatusRepository = $socialMediaStatusRepository;
        $this->serviceRepository = $serviceRepository;
        $this->clientUserRepository = $clientUserRepository;
    }

    public function index(Request $request, $id)
    {
        $client = $this->clientRepository->findByField('id', $id)->first();
        if ($client) {
            $name = $request->get('name');
            $from = $request->get('from');
            $to = $request->get('to');
            $pit = $request->get('pit');
            $services = $request->get('services');
            $status = $request->get('status');

            if (isset($name) || isset($from) || isset($to) ||
                isset($status) || isset($pit) || isset($services)) {
                $this->repository
                    ->pushCriteria(new FindByNameCriteria($name))
                    ->pushCriteria(new FindByFromToDateCriteria($from, $to))
                    ->pushCriteria(new FindByStatusIdArrayCriteria($status))
                    ->pushCriteria(new FindByPitCriteria($pit))
                    ->pushCriteria(new FindByServiceIdArrayCriteria($services));
            } else {
                $this->repository->skipCriteria();
            }

            $config = $this->header($client);
            $config['action'] = 'Listagem';

            $dados = $this->repository->getByClientId($id, 15);

            $statuses = $this->socialMediaStatusRepository->orderBy('name')->pluck('name', 'id');
            $services = $this->serviceRepository->orderBy('name')->scopeQuery(function ($query) {
                return $query->where('type_id', 1);
            })->pluck('name', 'id');

            return view('system.social-media.client.index', compact('dados', 'config', 'statuses', 'services', 'client'));
        }

        return redirect(route('home'), 301);
    }

    public function header($client)
    {
        $config['title'] = "Posts";
        $config['routeMenu'] = route('system.social-media.client.index', $client->id);
        $config['activeMenu'] = 'social-media';
        $config['titleMenu'] = 'Social Mídia';
        $config['routeMenuN2'] = route('system.social-media.client.index', $client->id);
        $config['activeMenuN2'] = 'social-meddia';
        $config['titleMenuN2'] = 'Posts';
        $config['route']['queryString'] = '';
        $getQueryString = request()->getQueryString();
        if (isset($getQueryString)) {
            $config['route']['queryString'] = '?' . request()->getQueryString();
        }

        return $config;
    }

    public function getClientsUsers($user_id)
    {
        return $this->clientUserRepository->with('client')->findByField('user_id', $user_id);
    }

    public function export(Request $request, $id)
    {
        $client = $this->clientRepository->findByField('id', $id)->first();
        if ($client) {
            $name = $request->get('name');
            $from = $request->get('from');
            $to = $request->get('to');
            $pit = $request->get('pit');
            $services = $request->get('services');
            $status = $request->get('status');

            if (isset($name) || isset($from) || isset($to) ||
                isset($status) || isset($pit) || isset($services)) {
                $this->repository
                    ->pushCriteria(new FindByNameCriteria($name))
                    ->pushCriteria(new FindByFromToDateCriteria($from, $to))
                    ->pushCriteria(new FindByStatusIdArrayCriteria($status))
                    ->pushCriteria(new FindByPitCriteria($pit))
                    ->pushCriteria(new FindByServiceIdArrayCriteria($services));
            } else {
                $this->repository->skipCriteria();
            }

            header("Pragma: no-cache");
            header("Expires: 0");
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=\"Follow_" . $client->name . '_' . date('Ymds') . ".csv\"");
            
            $dados = $this->repository->getByClientId($id, 'all');

            $header = $client->name;
            $header .= "\n";
            print utf8_decode($header);

            $campos = "Data;";
            $campos .= "Tema do conteúdo;";
            $campos .= "Rede Social;";
            $campos .= "Descrição;";
            $campos .= "\n";
            print utf8_decode($campos);

            foreach ($dados as $row) {

                $redes = '';
                if ($row->services) {
                    $redes = socialMedia($row->services);
                }


                $item = '"';
                $item .= utf8_decode(mysql_to_data($row->date)) . '";"';
                $item .= utf8_decode($row->name) . '";"';
                $item .= utf8_decode($redes) . '";"';
                $item .= utf8_decode(strip_tags($row->description)) . '";';
                $item .= "\r\n";

                echo $item;
            }
            exit;
        }
    }

}
