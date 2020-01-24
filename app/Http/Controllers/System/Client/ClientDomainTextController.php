<?php

namespace AgenciaS3\Http\Controllers\System\Client;

use AgenciaS3\Criteria\FindByNameCriteria;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ClientDomainTextRepository;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Validators\ClientDomainTextValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


/**
 * Class ClientDomainTextController
 * @package AgenciaS3\Http\Controllers\System\Client
 */
class ClientDomainTextController extends Controller
{

    /**
     * @var ClientDomainTextRepository
     */
    protected $repository;

    /**
     * @var ClientDomainTextValidator
     */
    protected $validator;

    /**
     * @var ClientRepository
     */
    protected $clientRepository;

    /**
     * ClientDomainTextController constructor.
     * @param ClientDomainTextRepository $repository
     * @param ClientDomainTextValidator $validator
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientDomainTextRepository $repository,
                                ClientDomainTextValidator $validator,
                                ClientRepository $clientRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param $client_id
     * @param $domain_id
     * @return Factory|View
     */
    public function index(Request $request, $client_id, $domain_id)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $search = $request->get('search');

        $config['action'] = 'Listagem';
        $dados = $this->repository->scopeQuery(function ($query) use ($domain_id) {
            return $query->where('client_domain_id', $domain_id);
        })->paginate();

        $client = $this->clientRepository->find($client_id);
        $config = $this->header($client, $domain_id);
        $config['action'] = 'Listagem';

        return view('system.client.domain.text.index', compact('dados', 'config', 'domain_id', 'client_id', 'search'));
    }

    /**
     * @param $client
     * @param $id
     * @return mixed
     */
    public function header($client, $id)
    {
        $config['title'] = "Registros > " . $client->name;
        $config['routeMenu'] = route('system.client.index');
        $config['activeMenu'] = 'client';
        $config['titleMenu'] = 'Clientes';
        $config['routeMenuN2'] = route('system.client.edit', $client->id);
        $config['activeMenuN2'] = 'domain';
        $config['titleMenuN2'] = $client->name;
        $config['routeMenuN3'] = route('system.client.domain.index', $client->id);
        $config['activeMenuN3'] = 'domain';
        $config['titleMenuN3'] = 'Acessos';
        $config['routeMenuN4'] = route('system.client.domain.text.index', ['client_id' => $client->id, 'id' => $id]);
        $config['activeMenuN4'] = 'text';
        $config['titleMenuN4'] = 'Registros';

        return $config;
    }

    /**
     * @param $client_id
     * @param $domain_id
     * @return Factory|View
     */
    public function create($client_id, $domain_id)
    {
        $client = $this->clientRepository->find($client_id);
        $config = $this->header($client, $domain_id);
        $config['action'] = 'Cadastrar';

        return view('system.client.domain.text.create', compact('config', 'domain_id', 'client_id'));
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
     * @param $client_id
     * @param $id
     * @return Factory|View
     */
    public function edit($client_id, $id)
    {
        $dados = $this->repository->find($id);
        $domain_id = $dados->client_domain_id;

        $client = $this->clientRepository->find($client_id);
        $config = $this->header($client, $domain_id);
        $config['action'] = 'Editar';

        return view('system.client.domain.text.edit', compact('dados', 'config', 'domain_id', 'client_id'));
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
