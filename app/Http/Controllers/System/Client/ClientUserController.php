<?php

namespace AgenciaS3\Http\Controllers\System\Client;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\ClientUserRepository;
use AgenciaS3\Repositories\UserRepository;
use AgenciaS3\Validators\ClientUserValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class ClientUserController
 * @package AgenciaS3\Http\Controllers\System\Client
 */
class ClientUserController extends Controller
{

    /**
     * @var ClientUserRepository
     */
    protected $repository;

    /**
     * @var ClientUserValidator
     */
    protected $validator;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var ClientRepository
     */
    protected $clientRepository;

    /**
     * ClientUserController constructor.
     * @param ClientUserRepository $repository
     * @param ClientUserValidator $validator
     * @param UserRepository $userRepository
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientUserRepository $repository,
                                ClientUserValidator $validator,
                                UserRepository $userRepository,
                                ClientRepository $clientRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userRepository = $userRepository;
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param $client_id
     * @return Factory|View
     */
    public function index($client_id)
    {
        $config['action'] = 'Listagem';
        $dados = $this->repository->with(['user', 'user.role', 'user.sectors.sector'])
            ->scopeQuery(function ($query) use ($client_id) {
                return $query->where('client_id', $client_id);
            })->paginate();

        $client = $this->clientRepository->find($client_id);
        $config = $this->header($client);
        $config['action'] = 'Listagem';

        $users = $this->userRepository->orderBy('name')->pluck('name', 'id');

        return view('system.client.user.index', compact('dados', 'config', 'users', 'client_id'));
    }

    /**
     * @param $client
     * @return mixed
     */
    public function header($client)
    {
        $config['title'] = "Usuários > " . $client->name;
        $config['routeMenu'] = route('system.client.index');
        $config['activeMenu'] = 'client';
        $config['titleMenu'] = 'Clientes';
        $config['routeMenuN2'] = route('system.client.edit', $client->id);
        $config['activeMenuN2'] = 'domain';
        $config['titleMenuN2'] = $client->name;
        $config['routeMenuN3'] = route('system.client.user.index', $client->id);
        $config['activeMenuN3'] = 'user';
        $config['titleMenuN3'] = 'Usuários';

        return $config;
    }

    /**
     * @param SystemRequest $request
     * @return RedirectResponse
     */
    public function store(SystemRequest $request)
    {
        $data = $request->all();
        $arraySuccess = [];
        $arrayErrors = [];
        if (is_array($data['users'])) {
            foreach ($data['users'] as $row) {
                $dados['client_id'] = $data['client_id'];
                $dados['user_id'] = $row;

                $user = $this->repository->findWhere(['client_id' => $data['client_id'], 'user_id' => $row])->first();
                if ($user) {
                    $arrayErrors[] = $user->user->name . ', ';
                } else {
                    $user = $this->save($dados);
                    $arraySuccess[] = $user . ', ';
                }
            }

            if (is_array($arraySuccess) && count($arraySuccess) > 0) {
                $response = [
                    'success' => 'Registro adicionado com sucesso!'
                ];

                return redirect()->back()->with('success', $response['success']);
            }
        }

        return redirect()->back()->withErrors('Nenhum usuário selecionado ou já adicionado!')->withInput();
    }

    /**
     * @param $data
     * @return bool
     */
    public function save($data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            return $dados->user->name;

        } catch (ValidatorException $e) {
            return false;
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
