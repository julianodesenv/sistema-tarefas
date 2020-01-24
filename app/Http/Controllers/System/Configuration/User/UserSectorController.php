<?php

namespace AgenciaS3\Http\Controllers\System\Configuration\User;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\SectorRepository;
use AgenciaS3\Repositories\UserRepository;
use AgenciaS3\Repositories\UserSectorRepository;
use AgenciaS3\Validators\UserSectorValidator;
use Prettus\Validator\Exceptions\ValidatorException;


class UserSectorController extends Controller
{

    protected $repository;

    protected $validator;

    protected $userRepository;

    protected $sectorRepository;

    public function __construct(UserSectorRepository $repository,
                                UserSectorValidator $validator,
                                UserRepository $userRepository,
                                SectorRepository $sectorRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userRepository = $userRepository;
        $this->sectorRepository = $sectorRepository;
    }

    public function index($user_id)
    {

        $sectors = $this->sectorRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $dados = $this->repository->with('user')->findByField('user_id', $user_id);
        if ($dados->toArray()) {
            $user = $dados->first()->user;
        } else {
            $user = $this->userRepository->find($user_id);
        }

        $config = $this->header($user);
        $config['action'] = 'Listagem';

        return view('system.configuration.user.sector.index', compact('dados', 'config', 'sectors', 'user_id', 'user'));
    }

    public function header($user)
    {
        $config['title'] = "Setores > " . $user->name;
        $config['routeMenuN'] = route('system.configuration.user.index');
        $config['activeMenu'] = 'configuration';
        $config['titleMenu'] = 'Configurações';
        $config['routeMenuN2'] = route('system.configuration.user.index');
        $config['activeMenuN2'] = 'user';
        $config['titleMenuN2'] = 'Usuários';
        $config['routeMenuN3'] = route('system.configuration.user.sector.index', $user->id);
        $config['activeMenuN3'] = 'sector';
        $config['titleMenuN3'] = 'Setores';

        return $config;
    }

    public function store(SystemRequest $request)
    {
        $data = $request->all();
        $check = $this->repository->findWhere(['sector_id' => $data['sector_id'], 'user_id' => $data['user_id']])->first();
        if ($check) {
            return redirect()->back()->withErrors('Setor já vinculado a este usuário!')->withInput();
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
