<?php

namespace AgenciaS3\Http\Controllers\System\Client;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\ClientServiceRepository;
use AgenciaS3\Repositories\DemandRepository;
use AgenciaS3\Repositories\ServiceRepository;
use AgenciaS3\Validators\ClientServiceValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class ClientServiceController
 * @package AgenciaS3\Http\Controllers\System\Client
 */
class ClientServiceController extends Controller
{

    /**
     * @var ClientServiceRepository
     */
    protected $repository;

    /**
     * @var ClientServiceValidator
     */
    protected $validator;

    /**
     * @var ServiceRepository
     */
    protected $serviceRepository;

    /**
     * @var DemandRepository
     */
    protected $demandRepository;

    /**
     * @var ClientRepository
     */
    protected $clientRepository;

    /**
     * ClientServiceController constructor.
     * @param ClientServiceRepository $repository
     * @param ClientServiceValidator $validator
     * @param ServiceRepository $serviceRepository
     * @param DemandRepository $demandRepository
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientServiceRepository $repository,
                                ClientServiceValidator $validator,
                                ServiceRepository $serviceRepository,
                                DemandRepository $demandRepository,
                                ClientRepository $clientRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->serviceRepository = $serviceRepository;
        $this->demandRepository = $demandRepository;
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param $client_id
     * @return Factory|View
     */
    public function index($client_id)
    {
        $dados = $this->repository->scopeQuery(function ($query) use ($client_id) {
            return $query->where('client_id', $client_id);
        })->paginate();

        $client = $this->clientRepository->find($client_id);
        $config = $this->header($client);
        $config['action'] = 'Listagem';

        $services = $this->serviceRepository->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $demands = $this->demandRepository->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.client.service.index', compact('dados', 'config', 'services', 'demands', 'client_id'));
    }

    /**
     * @param $client
     * @return mixed
     */
    public function header($client)
    {
        $config['title'] = "Serviços > " . $client->name;
        $config['routeMenu'] = route('system.client.index');
        $config['activeMenu'] = 'client';
        $config['titleMenu'] = 'Clientes';
        $config['routeMenuN2'] = route('system.client.edit', $client->id);
        $config['activeMenuN2'] = 'domain';
        $config['titleMenuN2'] = $client->name;
        $config['routeMenuN3'] = route('system.client.service.index', $client->id);
        $config['activeMenuN3'] = 'service';
        $config['titleMenuN3'] = 'Serviços';

        return $config;
    }

    /**
     * @param SystemRequest $request
     * @return RedirectResponse
     */
    public function store(SystemRequest $request)
    {
        $data = $request->all();
        $check = $this->repository->findWhere(['client_id' => $data['client_id'], 'service_id' => $data['service_id']])->first();
        if ($check) {
            return redirect()->back()->withErrors('Serviço já adicionado neste cliente!')->withInput();
        }

        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
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
