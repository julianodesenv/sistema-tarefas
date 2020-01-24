<?php

namespace AgenciaS3\Http\Controllers\System\Configuration\TypeClient;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\TypeClientRepository;
use AgenciaS3\Repositories\UserRoleRepository;
use AgenciaS3\Validators\TypeClientValidator;
use AgenciaS3\Validators\UserRoleValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TypeClientController extends Controller
{

    protected $repository;

    protected $validator;


    public function __construct(TypeClientRepository $repository,
                                TypeClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->paginate();

        return view('system.configuration.type-client.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Tipos de Cliente";
        $config['activeMenu'] = 'configuration';
        $config['titleMenu'] = 'Configurações';
        $config['activeMenuN2'] = 'user';
        $config['titleMenuN2'] = 'Tipos de Cliente';

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        return view('system.configuration.type-client.create', compact('config'));
    }

    public function store(SystemRequest $request)
    {
        try {
            $data = $request->all();

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

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);

        return view('system.configuration.type-client.edit', compact('dados', 'config'));
    }

    public function update(SystemRequest $request, $id)
    {
        try {
            $data = $request->all();

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
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
