<?php

namespace AgenciaS3\Http\Controllers\System\Configuration\Task;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\TaskProjectTemplateRepository;
use AgenciaS3\Validators\TaskProjectTemplateValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TaskProjectTemplateController extends Controller
{

    protected $repository;

    protected $validator;


    public function __construct(TaskProjectTemplateRepository $repository,
                                TaskProjectTemplateValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->orderBy('name')->paginate();

        return view('system.configuration.task.project-template.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Modelo de Projeto";
        $config['activeMenu'] = 'configuration';
        $config['titleMenu'] = 'Configurações';
        $config['activeMenuN2'] = 'social-media';
        $config['titleMenuN2'] = 'Tarefas';
        $config['activeMenuN3'] = 'project-template';
        $config['titleMenuN3'] = 'Modelo de Projeto';

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $projects = $this->repository->with('taskProjectTemplate')->orderBy('name')->findByField('task_project_template_id', null)->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.configuration.task.project-template.create', compact('config', 'projects'));
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

        $projects = $this->repository->orderBy('name')->findWhere(['task_project_template_id' => null, ['id', '!=', $id]])->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.configuration.task.project-template.edit', compact('dados', 'config', 'projects'));
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
        $check = $this->repository->findByField('task_project_template_id', $id)->first();
        if ($check) {
            return redirect()->back()->withErrors('Não é possível excluir esta ação pois existe itens vinculados!')->withInput();
        }
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
