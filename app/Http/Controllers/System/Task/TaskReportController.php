<?php

namespace AgenciaS3\Http\Controllers\System\Task;

use AgenciaS3\Criteria\Client\FindByClientIdCriteria;
use AgenciaS3\Criteria\FindByIdCriteria;
use AgenciaS3\Criteria\Task\FindByActionIdCriteria;
use AgenciaS3\Criteria\Task\FindByProjectIdCriteria;
use AgenciaS3\Criteria\Task\FindBySectorIdCriteria;
use AgenciaS3\Criteria\Task\FindByStartEndDateCriteria;
use AgenciaS3\Criteria\Task\FindByTaskActionIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskClientIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskProjectIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskSectorIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskStartEndDateCriteria;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\SectorRepository;
use AgenciaS3\Repositories\TaskActionRepository;
use AgenciaS3\Repositories\TaskPriorityRepository;
use AgenciaS3\Repositories\TaskProjectRepository;
use AgenciaS3\Repositories\TaskRepository;
use AgenciaS3\Repositories\TaskUserRepository;
use AgenciaS3\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TaskReportController extends Controller
{

    protected $repository;

    protected $clientRepository;

    protected $taskProjectRepository;

    protected $sectorRepository;

    protected $taskActionRepository;

    protected $taskPriorityRepository;

    protected $userRepository;

    protected $taskUserController;

    public function __construct(TaskUserRepository $repository,
                                ClientRepository $clientRepository,
                                TaskProjectRepository $taskProjectRepository,
                                SectorRepository $sectorRepository,
                                TaskActionRepository $taskActionRepository,
                                TaskPriorityRepository $taskPriorityRepository,
                                UserRepository $userRepository,
                                TaskUserController $taskUserController)
    {
        $this->repository = $repository;
        $this->clientRepository = $clientRepository;
        $this->taskProjectRepository = $taskProjectRepository;
        $this->sectorRepository = $sectorRepository;
        $this->taskActionRepository = $taskActionRepository;
        $this->taskPriorityRepository = $taskPriorityRepository;
        $this->userRepository = $userRepository;
        $this->taskUserController = $taskUserController;
    }

    public function index(Request $request)
    {
        $config = $this->header();
        $config['action'] = 'Relatórios';

        $id = $request->get('id');
        $client_id = $request->get('client_id');
        $project_id = $request->get('project_id');
        $sector_id = $request->get('sector_id');
        $action_id = $request->get('action_id');
        $from = $request->get('from');
        $to = $request->get('to');
        if (isset($id) || isset($client_id) || isset($project_id) || isset($sector_id) || isset($action_id) || isset($from) || isset($to)) {
            $this->repository
                ->pushCriteria(new FindByTaskIdCriteria($id))
                ->pushCriteria(new FindByTaskClientIdCriteria($client_id))
                ->pushCriteria(new FindByTaskProjectIdCriteria($project_id))
                ->pushCriteria(new FindByTaskSectorIdCriteria($sector_id))
                ->pushCriteria(new FindByTaskActionIdCriteria($action_id))
                ->pushCriteria(new FindByTaskStartEndDateCriteria($from, $to));
        } else {
            $this->repository->skipCriteria();
        }

        $dados = $this->repository->paginate();
        //dd($dados);

        $clients = $this->clientRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $projects = [];
        $sectors = $this->sectorRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $actions = [];
        $priorities = $this->taskPriorityRepository->orderBy('order')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $users = $this->userRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.task.report.index', compact('dados', 'config', 'clients', 'projects', 'sectors', 'actions', 'priorities', 'users'));
    }

    public function header()
    {
        $config['title'] = "Tarefas";
        $config['activeMenu'] = 'task';
        $config['titleMenu'] = 'Tarefas';

        return $config;
    }

    public function show($id, $task_user_id = null)
    {
        if ($id) {
            $dados = $this->repository->with([
                'action',
                'project',
                'sector',
                'priority',
                'users',
                'users.times'
            ])->findByField('id', $id)->first();
            $taskUser = null;
            $dateStart = null;
            $dateEnd = null;
            if (!is_null($task_user_id)) {
                $taskUser = $dados->users->where('id', $task_user_id)->first();
                $timesFirst = $taskUser->times->first();
                if ($timesFirst) {
                    $dateStart = $timesFirst->start;
                }
                $timesEnd = $taskUser->times->where('status', 'finish')->last();
                if ($timesEnd) {
                    $dateEnd = $timesEnd->end;
                }
            }

            return view('system.task.show', compact('dados', 'taskUser', 'dateStart', 'dateEnd'));
        }
    }

    public function calendar()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->with(['users', 'users.user', 'client', 'action', 'project', 'sector', 'priority'])->all();

        return view('system.task.calendar', compact('dados', 'config'));
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $clients = $this->clientRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $projects = ['Selecione um Cliente' => ''];
        $sectors = $this->sectorRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $actions = ['Selecione um Setor' => ''];
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
        $projects = $this->taskProjectRepository->orderBy('name')->findWhere(['active' => 'y', 'client_id' => $dados->client_id])->pluck('name', 'id')->prepend('Selecione', '');
        $sectors = $this->sectorRepository->orderBy('name')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');
        $actions = $this->taskActionRepository->orderBy('name')->findWhere(['active' => 'y', 'sector_id' => $dados->sector_id])->pluck('name', 'id')->prepend('Selecione', '');
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
