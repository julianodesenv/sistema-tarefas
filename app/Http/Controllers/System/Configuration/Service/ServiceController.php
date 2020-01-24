<?php

namespace AgenciaS3\Http\Controllers\System\Configuration\Service;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ServiceRepository;
use AgenciaS3\Repositories\TypeServiceRepository;
use AgenciaS3\Validators\ServiceValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class ServiceController extends Controller
{

    protected $repository;

    protected $validator;

    protected $typeServiceRepository;

    public function __construct(ServiceRepository $repository,
                                ServiceValidator $validator,
                                TypeServiceRepository $typeServiceRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->typeServiceRepository = $typeServiceRepository;
    }

    public function index()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->with('type')->paginate();

        return view('system.configuration.service.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Serviços";
        $config['activeMenu'] = 'configuration';
        $config['titleMenu'] = 'Configurações';
        $config['activeMenuN2'] = 'service';
        $config['titleMenuN2'] = 'Serviços';

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $types = $this->typeServiceRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.configuration.service.create', compact('config', 'types'));
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

        $types = $this->typeServiceRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.configuration.service.edit', compact('dados', 'config', 'types'));
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
