<?php

namespace AgenciaS3\Http\Controllers\System\Configuration\Task;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\TaskProjectRepository;
use AgenciaS3\Repositories\TaskProjectTemplateRepository;
use AgenciaS3\Validators\TaskProjectValidator;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TaskProjectController extends Controller
{

    protected $repository;

    protected $validator;

    protected $taskProjectTemplateRepository;

    protected $clientRepository;

    public function __construct(TaskProjectRepository $repository,
                                TaskProjectValidator $validator,
                                TaskProjectTemplateRepository $taskProjectTemplateRepository,
                                ClientRepository $clientRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->taskProjectTemplateRepository = $taskProjectTemplateRepository;
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->orderBy('name')->paginate();

        return view('system.configuration.task.project.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Projetos";
        $config['activeMenu'] = 'configuration';
        $config['titleMenu'] = 'Configurações';
        $config['activeMenuN2'] = 'social-media';
        $config['titleMenuN2'] = 'Tarefas';
        $config['activeMenuN3'] = 'project';
        $config['titleMenuN3'] = 'Projetos';

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $templates = $this->taskProjectTemplateRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $clients = $this->clientRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.configuration.task.project.create', compact('config', 'templates', 'clients'));
    }

    public function store(SystemRequest $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['start_date'] = data_to_mysql($data['start_date']);
            $data['end_date_forecast'] = data_to_mysql($data['end_date_forecast']);
            if (isPost($data['end_date'])) {
                $data['end_date'] = data_to_mysql($data['end_date']);
            }

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

        $dados->start_date = mysql_to_data($dados->start_date);
        $dados->end_date_forecast = mysql_to_data($dados->end_date_forecast);
        if (isPost($dados->end_date)) {
            $dados->end_date = mysql_to_data($dados->end_date);
        }

        $templates = $this->taskProjectTemplateRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $clients = $this->clientRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.configuration.task.project.edit', compact('dados', 'config', 'templates', 'clients'));
    }

    public function update(SystemRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['start_date'] = data_to_mysql($data['start_date']);
            $data['end_date_forecast'] = data_to_mysql($data['end_date_forecast']);
            if (isPost($data['end_date'])) {
                $data['end_date'] = data_to_mysql($data['end_date']);
            } else {
                $data['end_date'] = null;
            }

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
        dd('validação de verificação');
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
