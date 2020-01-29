<?php

namespace AgenciaS3\Http\Controllers\System\Task;

use AgenciaS3\Entities\TaskUser;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\TaskUserRepository;
use AgenciaS3\Repositories\UserRepository;
use AgenciaS3\Validators\TaskUserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TaskUserController extends Controller
{

    protected $repository;

    protected $validator;

    protected $userRepository;

    public function __construct(TaskUserRepository $repository,
                                TaskUserValidator $validator,
                                UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userRepository = $userRepository;
    }

    public function index($id = null)
    {
        $config = $this->header();
        $config['action'] = 'Listagem';

        $dados = $this->repository->findByField('user_id', 1);

        return view('system.task.my-task', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Tarefas";
        $config['activeMenu'] = 'task';
        $config['titleMenu'] = 'Tarefas';

        return $config;
    }

    public function checkUsers($id, $dados)
    {
        //consulta os usuarios atuais e compara com o novo array
        $taskUsers = $this->repository->findByField('task_id', $id);
        if ($taskUsers) {
            $users = [];
            foreach ($taskUsers as $row) {
                $users[$row->user_id] = $row->user_id;
            }

            $newUsers = [];
            foreach ($dados as $row) {
                $newUsers[$row] = $row;
            }

            $arrayDelete = array_diff_key($users, $newUsers);
            $delete = TaskUser::whereIn('user_id', $arrayDelete)->get()->each->delete();

            return $this->addUsers($id, $dados);
        }
    }

    public function addUsers($id, $dados)
    {
        if (is_array($dados)) {
            foreach ($dados as $row) {
                $data['task_id'] = $id;
                $data['user_id'] = $row;
                $data['status'] = 'pause';
                $this->store($data);
            }

            return response()->json([
                'success' => true,
                'message' => 'Usuários adicionados com sucesso!'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Nenhum usuário cadastrado!'
        ]);

    }

    public function store($data)
    {
        $check = $this->repository->findWhere(['task_id' => $data['task_id'], 'user_id' => $data['user_id']])->first();
        if (!$check) {
            try {
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $dados = $this->repository->create($data);

                return response()->json([
                    'success' => true,
                    'data' => $dados
                ]);

            } catch (ValidatorException $e) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessage()
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

    public function updateStatusAndTotal($id, $total, $status)
    {
        $dados = $this->repository->findByField('id', $id)->first();
        if ($dados) {
            try {
                $data = $dados->toArray();
                if(!is_null($total)) {
                    $data['total'] = calculaHoras($dados->total, $total);
                }
                $data['status'] = $status;
                //dd($dados->total, $total, $data['total']);

                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
                $dados = $this->repository->update($data, $id);

                $response = [
                    'success' => 'Registro alterado com sucesso!'
                ];

                return $response['success'];

            } catch (ValidatorException $e) {
                return $e->getMessageBag();
            }
        }

        return false;
    }

}
