<?php

namespace AgenciaS3\Http\Controllers\System\Task;

use AgenciaS3\Criteria\FindByUserIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskActionIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskClientIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskProjectIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskSectorIdCriteria;
use AgenciaS3\Criteria\Task\FindByTaskStartEndDateCriteria;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\SectorRepository;
use AgenciaS3\Repositories\TaskActionRepository;
use AgenciaS3\Repositories\TaskPriorityRepository;
use AgenciaS3\Repositories\TaskProjectRepository;
use AgenciaS3\Repositories\TaskTimeRepository;
use AgenciaS3\Repositories\TaskUserRepository;
use AgenciaS3\Repositories\UserRepository;
use Illuminate\Http\Request;


class TaskReportController extends Controller
{

    protected $repository;

    protected $clientRepository;

    protected $taskProjectRepository;

    protected $sectorRepository;

    protected $taskActionRepository;

    protected $taskPriorityRepository;

    protected $userRepository;

    protected $taskTimeRepository;

    public function __construct(TaskUserRepository $repository,
                                ClientRepository $clientRepository,
                                TaskProjectRepository $taskProjectRepository,
                                SectorRepository $sectorRepository,
                                TaskActionRepository $taskActionRepository,
                                TaskPriorityRepository $taskPriorityRepository,
                                UserRepository $userRepository,
                                TaskTimeRepository $taskTimeRepository)
    {
        $this->repository = $repository;
        $this->clientRepository = $clientRepository;
        $this->taskProjectRepository = $taskProjectRepository;
        $this->sectorRepository = $sectorRepository;
        $this->taskActionRepository = $taskActionRepository;
        $this->taskPriorityRepository = $taskPriorityRepository;
        $this->userRepository = $userRepository;
        $this->taskTimeRepository = $taskTimeRepository;
    }

    public function index(Request $request)
    {
        $config = $this->header();
        $config['action'] = 'Relatórios';

        $dados = null;

        $id = $request->get('id');
        $client_id = $request->get('client_id');
        $project_id = $request->get('project_id');
        $sector_id = $request->get('sector_id');
        $action_id = $request->get('action_id');
        $user_id = $request->get('user_id');
        $from = $request->get('from');
        $to = $request->get('to');
        if (isset($id) || isset($client_id) || isset($project_id) || isset($sector_id) || isset($action_id) || isset($from) || isset($to) || isset($user_id)) {
            $this->repository
                ->pushCriteria(new FindByTaskIdCriteria($id))
                ->pushCriteria(new FindByTaskClientIdCriteria($client_id))
                ->pushCriteria(new FindByTaskProjectIdCriteria($project_id))
                ->pushCriteria(new FindByTaskSectorIdCriteria($sector_id))
                ->pushCriteria(new FindByTaskActionIdCriteria($action_id))
                ->pushCriteria(new FindByUserIdCriteria($user_id))
                ->pushCriteria(new FindByTaskStartEndDateCriteria($from, $to));

            $dados = $this->repository->with([
                'task',
                'task.project',
                'task.sector',
                'task.action',
                'task.client',
                'task.responsible',
                'user',
                'times'
            ])->all();
        } else {
            $this->repository->skipCriteria();
        }

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

    public function show($id)
    {
        if ($id) {
            $dados = $this->taskTimeRepository->findByField('task_user_id', $id);
            if ($dados) {
                $playPauses = $dados->where('status', '!=', 'finish');
                $finish = $dados->where('status', 'finish')->last();

                return view('system.task.report.show', compact('dados', 'playPauses', 'finish'));
            }
        }

        return false;
    }

}
