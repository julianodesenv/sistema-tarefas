<?php

namespace AgenciaS3\Http\Controllers\System\Task;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\SectorRepository;
use AgenciaS3\Repositories\TaskActionRepository;
use AgenciaS3\Repositories\TaskPriorityRepository;
use AgenciaS3\Repositories\TaskProjectRepository;
use AgenciaS3\Repositories\TaskRepository;
use AgenciaS3\Repositories\UserRepository;
use AgenciaS3\Validators\TaskValidator;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TaskController extends Controller
{

    protected $repository;

    protected $validator;

    protected $clientRepository;

    protected $taskProjectRepository;

    protected $sectorRepository;

    protected $taskActionRepository;

    protected $taskPriorityRepository;

    protected $userRepository;

    protected $taskUserController;

    public function __construct(TaskRepository $repository,
                                TaskValidator $validator,
                                ClientRepository $clientRepository,
                                TaskProjectRepository $taskProjectRepository,
                                SectorRepository $sectorRepository,
                                TaskActionRepository $taskActionRepository,
                                TaskPriorityRepository $taskPriorityRepository,
                                UserRepository $userRepository,
                                TaskUserController $taskUserController)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->clientRepository = $clientRepository;
        $this->taskProjectRepository = $taskProjectRepository;
        $this->sectorRepository = $sectorRepository;
        $this->taskActionRepository = $taskActionRepository;
        $this->taskPriorityRepository = $taskPriorityRepository;
        $this->userRepository = $userRepository;
        $this->taskUserController = $taskUserController;
    }

    public function index()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->with(['users', 'users.user'])->paginate();

        return view('system.task.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Tarefas";
        $config['activeMenu'] = 'task';
        $config['titleMenu'] = 'Tarefas';

        return $config;
    }

    public function calendar()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->with(['users', 'users.user'])->all();

        return view('system.task.calendar', compact('dados', 'config'));
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $clients = $this->clientRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $projects = $this->taskProjectRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $sectors = $this->sectorRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $actions = $this->taskActionRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $priorities = $this->taskPriorityRepository->orderBy('order')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $users = $this->userRepository->orderBy('name')->all();
        $responsibleUsers = $users->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.task.create', compact('config', 'clients', 'sectors', 'actions', 'priorities', 'users', 'responsibleUsers', 'projects'));
    }

    public function store(SystemRequest $request)
    {
        $data = $request->all();
        if (!isset($data['users']) || !is_array($data['users'])) {
            return redirect()->back()->withErrors('Selecione um usuário!')->withInput();
        }
        try {
            $data['user_id'] = Auth::user()->id;
            $data['start_date'] = data_to_mysql($data['start_date']);
            $data['end_date'] = data_to_mysql($data['end_date']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            if (isset($data['users']) && is_array($data['users'])) {
                $this->taskUserController->addUsers($dados->id, $data['users']);
            }

            return redirect()->back()->with('success', $response['success']);
            //return redirect()->route('system.task.user.index', $dados->id)->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->with('users')->find($id);
        $dados->start_date = mysql_to_data($dados->start_date);
        $dados->end_date = mysql_to_data($dados->end_date);

        $clients = $this->clientRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $projects = $this->taskProjectRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $sectors = $this->sectorRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $actions = $this->taskActionRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $priorities = $this->taskPriorityRepository->orderBy('order')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $users = $this->userRepository->orderBy('name')->all();
        $responsibleUsers = $users->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.task.edit', compact('dados', 'config', 'clients', 'sectors', 'actions', 'priorities', 'users', 'responsibleUsers', 'projects'));
    }

    public function update(SystemRequest $request, $id)
    {
        $data = $request->all();
        if (!isset($data['users']) || !is_array($data['users'])) {
            return redirect()->back()->withErrors('Selecione um usuário!')->withInput();
        }
        try {
            $data['start_date'] = data_to_mysql($data['start_date']);
            $data['end_date'] = data_to_mysql($data['end_date']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            if (isset($data['users']) && is_array($data['users'])) {
                $this->taskUserController->checkUsers($id, $data['users']);
            }
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
