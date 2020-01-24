<?php

namespace AgenciaS3\Http\Controllers\System\Schedule;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ScheduleUserRepository;
use AgenciaS3\Repositories\UserRepository;
use AgenciaS3\Validators\ScheduleUserValidator;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class ScheduleUserController extends Controller
{

    protected $repository;

    protected $validator;

    protected $userRepository;

    public function __construct(ScheduleUserRepository $repository,
                                ScheduleUserValidator $validator,
                                UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userRepository = $userRepository;
    }

    public function index($schedule_id)
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->with(['user', 'user.role', 'user.sectors.sector'])->scopeQuery(function ($query) use ($schedule_id) {
            return $query->where('schedule_id', $schedule_id);
        })->paginate();

        $users = $this->userRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.schedule.user.index', compact('dados', 'config', 'users', 'schedule_id'));
    }

    public function header()
    {
        $config['title'] = "Usuários";
        $config['activeMenu'] = 'schedule';
        $config['titleMenu'] = 'Agenda';
        $config['activeMenuN2'] = 'user';
        $config['titleMenuN2'] = 'Usuários';

        return $config;
    }

    public function store(SystemRequest $request)
    {
        $data = $request->all();
        $check = $this->repository->findWhere(['schedule_id' => $data['schedule_id'], 'user_id' => $data['user_id']])->first();
        if ($check) {
            return redirect()->back()->withErrors('Usuário já adicionado neste agenda!')->withInput();
        }
        try {
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

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
