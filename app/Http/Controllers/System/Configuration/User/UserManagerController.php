<?php

namespace AgenciaS3\Http\Controllers\System\Configuration\User;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\UserManagerRepository;
use AgenciaS3\Repositories\UserRepository;
use AgenciaS3\Validators\UserManagerValidator;
use Prettus\Validator\Exceptions\ValidatorException;


class UserManagerController extends Controller
{

    protected $repository;

    protected $validator;

    protected $userRepository;

    public function __construct(UserManagerRepository $repository,
                                UserManagerValidator $validator,
                                UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userRepository = $userRepository;
    }

    public function index($user_id)
    {

        $user = $this->userRepository->find($user_id);

        $config = $this->header($user);
        $config['action'] = 'Listagem';

        $users = $this->userRepository->orderBy('name')->findByField('role_id', 2)->pluck('name', 'id')->prepend('Selecione', '');
        $dados = $this->repository->with('manager')->findByField('user_id', $user_id);

        return view('system.configuration.user.manager.index', compact('dados', 'config', 'users', 'user_id'));
    }

    public function header($user)
    {
        $config['title'] = "Gerente > ".$user->name;;
        $config['routeMenuN'] = route('system.configuration.user.index');
        $config['activeMenu'] = 'configuration';
        $config['titleMenu'] = 'Configurações';
        $config['routeMenuN2'] = route('system.configuration.user.index');
        $config['activeMenuN2'] = 'user';
        $config['titleMenuN2'] = 'Usuários';
        $config['routeMenuN3'] = route('system.configuration.user.manager.index', $user->id);
        $config['activeMenuN3'] = 'manager';
        $config['titleMenuN3'] = 'Gerente';

        return $config;
    }

    public function store(SystemRequest $request)
    {
        $data = $request->all();
        $check = $this->repository->findWhere(['manager_id' => $data['manager_id'], 'user_id' => $data['user_id']])->first();
        if ($check) {
            return redirect()->back()->withErrors('Usuáirio já vinculado a este gerente')->withInput();
        }

        try {
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
