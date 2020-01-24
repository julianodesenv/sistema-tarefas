<?php

namespace AgenciaS3\Http\Controllers\System\SocialMedia;

use AgenciaS3\Criteria\Client\FindByClientIdCriteria;
use AgenciaS3\Criteria\FindByFromToDateCriteria;
use AgenciaS3\Criteria\FindByNameCriteria;
use AgenciaS3\Criteria\FindByStatusIdArrayCriteria;
use AgenciaS3\Criteria\SocialMedia\FindByClientByUserCriteria;
use AgenciaS3\Criteria\SocialMedia\FindByPitCriteria;
use AgenciaS3\Criteria\SocialMedia\FindByServiceIdArrayCriteria;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\ServiceRepository;
use AgenciaS3\Repositories\SocialMediaPostRepository;
use AgenciaS3\Repositories\SocialMediaStatusRepository;
use AgenciaS3\Validators\SocialMediaPostValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class SocialMediaPostController
 * @package AgenciaS3\Http\Controllers\System\SocialMedia
 */
class SocialMediaPostController extends Controller
{

    protected $repository;

    protected $validator;

    protected $clientRepository;

    protected $socialMediaStatusRepository;

    protected $serviceRepository;

    /**
     * SocialMediaPostController constructor.
     * @param SocialMediaPostRepository $repository
     * @param SocialMediaPostValidator $validator
     * @param ClientRepository $clientRepository
     * @param SocialMediaStatusRepository $socialMediaStatusRepository
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(SocialMediaPostRepository $repository,
                                SocialMediaPostValidator $validator,
                                ClientRepository $clientRepository,
                                SocialMediaStatusRepository $socialMediaStatusRepository,
                                ServiceRepository $serviceRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->clientRepository = $clientRepository;
        $this->socialMediaStatusRepository = $socialMediaStatusRepository;
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $client_id = $request->get('client_id');
        $from = $request->get('from');
        $to = $request->get('to');
        $pit = $request->get('pit');
        $services = $request->get('services');
        $status = $request->get('status');

        if (isset($name) || isset($client_id) || isset($from) || isset($to) ||
            isset($status) || isset($pit) || isset($services)) {
            $this->repository
                ->pushCriteria(new FindByNameCriteria($name))
                ->pushCriteria(new FindByClientIdCriteria($client_id))
                ->pushCriteria(new FindByFromToDateCriteria($from, $to))
                ->pushCriteria(new FindByStatusIdArrayCriteria($status))
                ->pushCriteria(new FindByPitCriteria($pit))
                ->pushCriteria(new FindByServiceIdArrayCriteria($services));
        } else {
            $this->repository->skipCriteria();
        }

        $config = $this->header();
        $config['action'] = 'Listagem';

        if (Auth::user()->role_id == 1) {
            //admin
            $dados = $this->repository
                ->with(['services', 'services.service', 'status', 'client'])
                ->orderBy('date', 'asc')->paginate();
        } else {
            $this->repository->pushCriteria(new FindByClientByUserCriteria(Auth::user()->id));
            $dados = $this->repository->getByClientUser(Auth::user()->id);
        }

        $clients = $this->clientRepository->orderBy('name')->pluck('name', 'id')->prepend('Cliente', '');
        $statuses = $this->socialMediaStatusRepository->orderBy('name')->pluck('name', 'id');
        $services = $this->serviceRepository->orderBy('name')->scopeQuery(function ($query) {
            return $query->where('type_id', 1);
        })->pluck('name', 'id');

        return view('system.social-media.post.index', compact('dados', 'config', 'clients', 'statuses', 'services', 'status'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function all(Request $request)
    {
        $name = $request->get('name');
        $client_id = $request->get('client_id');
        $from = $request->get('from');
        $to = $request->get('to');
        $pit = $request->get('pit');
        $services = $request->get('services');
        $status = $request->get('status');

        if (isset($name) || isset($client_id) || isset($from) || isset($to) ||
            isset($status) || isset($pit) || isset($services)) {
            $this->repository
                ->pushCriteria(new FindByNameCriteria($name))
                ->pushCriteria(new FindByClientIdCriteria($client_id))
                ->pushCriteria(new FindByFromToDateCriteria($from, $to))
                ->pushCriteria(new FindByStatusIdArrayCriteria($status))
                ->pushCriteria(new FindByPitCriteria($pit))
                ->pushCriteria(new FindByServiceIdArrayCriteria($services));
        } else {
            $this->repository->skipCriteria();
        }

        $config = $this->header();
        $config['action'] = 'Listagem';

        if (Auth::user()->role_id == 1) {
            //admin
            $dados = $this->repository
                ->with(['services', 'services.service', 'status', 'client'])
                ->orderBy('date', 'asc')->paginate();
        } elseif (Auth::user()->role_id == 2) {
            //gerentes
            $this->repository->pushCriteria(new FindByClientByUserCriteria(Auth::user()->id));
            $dados = $this->repository->getByClientManagerUser(Auth::user()->id);
        } else {
            $this->repository->pushCriteria(new FindByClientByUserCriteria(Auth::user()->id));
            $dados = $this->repository->getByClientUser(Auth::user()->id);
        }

        $clients = $this->clientRepository->orderBy('name')->pluck('name', 'id')->prepend('Cliente', '');
        $statuses = $this->socialMediaStatusRepository->orderBy('name')->pluck('name', 'id');
        $services = $this->serviceRepository->orderBy('name')->scopeQuery(function ($query) {
            return $query->where('type_id', 1);
        })->pluck('name', 'id');

        return view('system.social-media.post.all.index', compact('dados', 'config', 'clients', 'statuses', 'services', 'status'));
    }

    /**
     * @return mixeds
     */
    public function header()
    {
        $config['title'] = "Posts";
        $config['activeMenu'] = 'social-media';
        $config['routeMenu'] = route('system.social-media.post.index');
        $config['titleMenu'] = 'Social Mídia';
        $config['activeMenuN2'] = 'social-media';
        $config['routeMenuN2'] = route('system.social-media.post.index');
        $config['titleMenuN2'] = 'Posts';

        return $config;
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $clients = $this->clientRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $status = $this->socialMediaStatusRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.social-media.post.create', compact('config', 'clients', 'status'));
    }

    /**
     * @param SystemRequest $request
     * @return RedirectResponse
     */
    public function store(SystemRequest $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['date'] = data_to_mysql($data['date']);
            if (isset($data['deadline'])) {
                $data['deadline'] = data_to_mysql($data['deadline']);
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->route('system.social-media.post.service.index', $dados->id)->with('success', $response['success']);
            //return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);

        $clients = $this->clientRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $status = $this->socialMediaStatusRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        $dados->date = mysql_to_data($dados->date);
        if (isset($dados->deadline)) {
            $dados->deadline = mysql_to_data($dados->deadline);
        }

        return view('system.social-media.post.edit', compact('dados', 'config', 'clients', 'status'));
    }

    /**
     * @param SystemRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(SystemRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['date'] = data_to_mysql($data['date']);
            if (isset($data['deadline'])) {
                $data['deadline'] = data_to_mysql($data['deadline']);
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            $response = [
                'success' => 'Registro alterado com sucesso!'
            ];

            return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function active($id)
    {
        try {
            $dados = $this->repository->find($id);

            $data = $dados->toArray();
            if ($dados->active == 'y') {
                $data['active'] = 'n';
            } else {
                $data['active'] = 'y';
            }

            $dados = $this->repository->update($data, $id);

            return $dados;

        } catch (ValidatorException $e) {
            return false;
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
