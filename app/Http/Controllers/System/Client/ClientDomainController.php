<?php

namespace AgenciaS3\Http\Controllers\System\Client;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ClientDomainRepository;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Validators\ClientDomainValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class ClientDomainController
 * @package AgenciaS3\Http\Controllers\System\Client
 */
class ClientDomainController extends Controller
{

    /**
     * @var ClientDomainRepository
     */
    protected $repository;

    /**
     * @var ClientDomainValidator
     */
    protected $validator;

    /**
     * @var ClientRepository
     */
    protected $clientRepository;

    /**
     * ClientDomainController constructor.
     * @param ClientDomainRepository $repository
     * @param ClientDomainValidator $validator
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientDomainRepository $repository,
                                ClientDomainValidator $validator,
                                ClientRepository $clientRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param $client_id
     * @return Factory|View
     */
    public function index($client_id)
    {
        $config['action'] = 'Listagem';
        $dados = $this->repository->scopeQuery(function ($query) use ($client_id) {
            return $query->where('client_id', $client_id);
        })->paginate();

        $client = $this->clientRepository->find($client_id);
        $config = $this->header($client);
        $config['action'] = 'Listagem';

        return view('system.client.domain.index', compact('dados', 'config', 'client_id'));
    }

    /**
     * @param $client
     * @return mixed
     */
    public function header($client)
    {
        $config['title'] = "Acessos > " . $client->name;
        $config['routeMenu'] = route('system.client.index');
        $config['activeMenu'] = 'client';
        $config['titleMenu'] = 'Clientes';
        $config['routeMenuN2'] = route('system.client.edit', $client->id);
        $config['activeMenuN2'] = 'domain';
        $config['titleMenuN2'] = $client->name;
        $config['routeMenuN3'] = route('system.client.domain.index', $client->id);
        $config['activeMenuN3'] = 'domain';
        $config['titleMenuN3'] = 'Acessos';

        return $config;
    }

    /**
     * @param $client_id
     * @return Factory|View
     */
    public function create($client_id)
    {
        $client = $this->clientRepository->find($client_id);
        $config = $this->header($client);
        $config['action'] = 'Cadastrar';

        return view('system.client.domain.create', compact('config', 'client_id'));
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
     * @return Factory|View
     */
    public function edit($id)
    {
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);
        $client_id = $dados->client_id;
        $client = $this->clientRepository->find($client_id);
        $config = $this->header($client);

        return view('system.client.domain.edit', compact('dados', 'config', 'client_id'));
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
