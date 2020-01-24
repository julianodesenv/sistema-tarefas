<?php

namespace AgenciaS3\Http\Controllers\System\Configuration\User;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Mail\User\UserCreatedMail;
use AgenciaS3\Repositories\UserRepository;
use AgenciaS3\Repositories\UserRoleRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\UserValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class UserController extends Controller
{

    protected $repository;

    protected $validator;

    protected $userRoleRepository;

    protected $utilObjeto;

    protected $path;

    public function __construct(UserRepository $repository,
                                UserValidator $validator,
                                UserRoleRepository $userRoleRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userRoleRepository = $userRoleRepository;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/users/';
    }

    public function index()
    {
        if (Auth::user()->role->id != 1) {
            return redirect('system.home.index', 301);
        }

        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->with('role')
            ->orderBy('name', 'asc')
            ->paginate();

        return view('system.configuration.user.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Usuários";
        $config['activeMenu'] = 'configuration';
        $config['routeMenuN'] = route('system.configuration.user.index');
        $config['titleMenu'] = 'Configurações';
        $config['routeMenuN2'] = route('system.configuration.user.index');
        $config['activeMenuN2'] = 'user';
        $config['titleMenuN2'] = 'Usuários';

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';
        $roles = $this->userRoleRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.configuration.user.create', compact('config', 'roles'));
    }

    public function store(SystemRequest $request)
    {
        try {
            $data = $request->all();

            if (isset($data['image'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['image'] = $image;
                }
            }

            if (isset($data['birth_date'])) {
                $data['birth_date'] = data_to_mysql($data['birth_date']);
            }

            $passwordCreated = isset($data['password']) ? $data['password'] : null;

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data['password'] = isset($data['password']) ? bcrypt($data['password']) : null;
            $data['password_confirmation'] = $data['password'];

            $dados = $this->repository->create($data);

            Mail::to($dados->email)->send(new UserCreatedMail($dados, $passwordCreated));

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->route('system.configuration.user.sector.index', $dados->id)->with('success', $response['success']);

        } catch (ValidatorException $e) {
            if (isset($data['image'])) {
                $this->utilObjeto->destroyFile($this->path, $data['image']);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);
        $dados->birth_date = mysql_to_data($dados->birth_date);

        $roles = $this->userRoleRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.configuration.user.edit', compact('dados', 'config', 'roles'));
    }

    public function update(SystemRequest $request, $id)
    {
        try {
            $data = $request->all();

            if (isset($data['birth_date'])) {
                $data['birth_date'] = data_to_mysql($data['birth_date']);
            }

            if (isset($data['image'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['image'] = $image;
                }
            }

            //$data['password'] = bcrypt($data['password']);
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

    public function destroy($id)
    {
        $this->destroyFile($id, 'image');
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

    public function destroyFile($id, $name)
    {
        $dados = $this->repository->find($id);
        if (isset($dados->$name)) {
            $data = $dados->toArray();
            if (isset($dados->$name) && $this->utilObjeto->destroyFile($this->path, $dados->$name)) {

                $data[$name] = '';
                $this->repository->update($data, $id);

                return redirect()->back()->with('success', ucfirst($name) . ' removida com sucesso!');
            }

            return redirect()->back()->withErrors('Erro ao excluír ' . ucfirst($name))->withInput();
        }
    }

    public function destroyImage($id)
    {
        $dados = $this->repository->find($id);
        if (isset($dados->image)) {
            $data = $dados->toArray();
            if (isset($dados->image) && $this->utilObjeto->destroyFile($this->path, $dados->image)) {

                $data['image'] = '';
                $this->repository->update($data, $id);

                return redirect()->back()->with('success', 'Imagem removida com sucesso!');
            }

            return redirect()->back()->withErrors('Erro ao excluír imagem')->withInput();
        }
    }

}
