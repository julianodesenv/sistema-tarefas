<?php

namespace AgenciaS3\Http\Controllers\System\Configuration\Task;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\SectorRepository;
use AgenciaS3\Repositories\TaskActionRepository;
use AgenciaS3\Validators\TaskActionValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TaskActionController extends Controller
{

    protected $repository;

    protected $validator;

    protected $sectorRepository;

    public function __construct(TaskActionRepository $repository,
                                TaskActionValidator $validator,
                                SectorRepository $sectorRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->sectorRepository = $sectorRepository;
    }

    public function index()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->with(array('sector' => function($query){
            $query->orderBy('name');
        }))->orderBy('name')->paginate();

        return view('system.configuration.task.action.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Ação da Tarefa";
        $config['activeMenu'] = 'configuration';
        $config['titleMenu'] = 'Configurações';
        $config['activeMenuN2'] = 'social-media';
        $config['titleMenuN2'] = 'Tarefas';
        $config['activeMenuN3'] = 'action';
        $config['titleMenuN3'] = 'Ação Tarefa';

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $actions = $this->repository->with('taskAction')->orderBy('name')->findByField('task_action_id', null)->pluck('name', 'id')->prepend('Selecione', '');
        $sectors = $this->sectorRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.configuration.task.action.create', compact('config', 'actions', 'sectors'));
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

        $actions = $this->repository->orderBy('name')->findWhere(['task_action_id' => null, ['id', '!=', $id]])->pluck('name', 'id')->prepend('Selecione', '');
        $sectors = $this->sectorRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.configuration.task.action.edit', compact('dados', 'config', 'actions', 'sectors'));
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
        $check = $this->repository->findByField('task_action_id', $id)->first();
        if($check){
            return redirect()->back()->withErrors('Não é possível excluir esta ação pois existe itens vinculados!')->withInput();
        }
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
