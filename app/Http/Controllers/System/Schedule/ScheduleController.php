<?php

namespace AgenciaS3\Http\Controllers\System\Schedule;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ScheduleRepository;
use AgenciaS3\Validators\ScheduleValidator;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class ScheduleController extends Controller
{

    protected $repository;

    protected $validator;


    public function __construct(ScheduleRepository $repository,
                                ScheduleValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->with(['users', 'users.user'])->paginate();

        return view('system.schedule.index', compact('dados', 'config'));
    }

    public function calendar()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->with(['users', 'users.user'])->all();

        return view('system.schedule.calendar', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Agenda";
        $config['activeMenu'] = 'schedule';
        $config['titleMenu'] = 'Agenda';

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        return view('system.schedule.create', compact('config'));
    }

    public function store(SystemRequest $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['date'] = data_to_mysql_hour($data['date']) . ':00';

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->route('system.schedule.user.index', $dados->id)->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);
        $dados->date = mysql_to_data($dados->date);

        return view('system.schedule.edit', compact('dados', 'config'));
    }

    public function update(SystemRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['date'] = data_to_mysql_hour($data['date']) . ':00';

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
