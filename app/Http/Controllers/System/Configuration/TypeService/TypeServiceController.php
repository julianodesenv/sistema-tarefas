<?php

namespace AgenciaS3\Http\Controllers\System\Configuration\TypeService;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\TypeServiceRepository;
use AgenciaS3\Validators\TypeServiceValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TypeServiceController extends Controller
{

    protected $repository;

    protected $validator;


    public function __construct(TypeServiceRepository $repository,
                                TypeServiceValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->paginate();

        return view('system.configuration.type-service.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Tipo Serviço";
        $config['activeMenu'] = 'configuration';
        $config['titleMenu'] = 'Configurações';
        $config['activeMenuN2'] = 'type-servvice';
        $config['titleMenuN2'] = 'Tipo Serviço';

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        return view('system.configuration.type-service.create', compact('config'));
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

        return view('system.configuration.type-service.edit', compact('dados', 'config'));
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
