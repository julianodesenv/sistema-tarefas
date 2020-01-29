<?php

namespace AgenciaS3\Http\Controllers\System\Task;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\TaskTimeRepository;
use AgenciaS3\Validators\TaskTimeValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TaskTimeController extends Controller
{

    protected $repository;

    protected $validator;

    protected $taskUserController;

    protected $taskController;

    public function __construct(TaskTimeRepository $repository,
                                TaskTimeValidator $validator,
                                TaskUserController $taskUserController,
                                TaskController $taskController)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->taskUserController = $taskUserController;
        $this->taskController = $taskController;
    }

    public function play(SystemRequest $request, $id)
    {
        $data = $request->all();

        $check = $this->repository->findWhere(['task_user_id' => $id, ['status', '!=', 'play']])->first();
        if ($check) {
            $data['start'] = date('Y-m-d H:i:s');
            $data['task_user_id'] = $id;
            $data['status'] = 'play';

            $response = $this->save($data);

            return response()->json([
                'success' => true,
                'message' => $response
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Error'
        ]);

    }

    public function save($data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $time = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            $this->taskUserController->updateStatusAndTotal($time->task_user_id, null, 'play');

            return $response['success'];

        } catch (ValidatorException $e) {
            return $e->getMessageBag();
        }
    }

    public function pause(SystemRequest $request, $id)
    {
        //atualiza o resgistro que esta com play
        $data = $request->all();
        $time = $this->repository->findWhere(['task_user_id' => $id, 'status' => 'play'])->first();
        if ($time) {
            $data['start'] = $time->start;
            $data['end'] = date('Y-m-d H:i:s');
            $data['task_user_id'] = 1;
            $data['description'] = 'primeira pausa';
            $data['status'] = 'pause';

            $response = $this->update($data, $time->id);

            /*
             * Passos
             * ATUALIZA TIME
             * SOMA TOTAL DO TEMPO DA TIME
             * ATUALIZA TASK USER
             * SOMA TOTAL TASK USER + TOTAL TIME
             */
            $total = dataDiferencaHorario($data['start'], $data['end']);
            $this->taskUserController->updateStatusAndTotal($time->task_user_id, $total, 'pause');

            return $response;

            //atualizar status e total task_user
            //total do time
            //time
        }

        return 'Status incorreto';
    }

    public function update($data, $id)
    {
        try {
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

    public function finish(SystemRequest $request, $id)
    {
        //atualiza o resgistro que esta com play
        $data = $request->all();
        $time = $this->repository->findWhere(['task_user_id' => $id, 'status' => 'play'])->first();
        if ($time) {
            $data['start'] = $time->start;
            $data['end'] = date('Y-m-d H:i:s');
            $data['task_user_id'] = 1;
            $data['description'] = 'finalização';
            $data['status'] = 'finish';

            $this->update($data, $time->id);
            /*
             * Passos
             * ATUALIZA TIME
             * SOMA TOTAL DO TEMPO DA TIME
             * ATUALIZA TASK USER
             * SOMA TOTAL TASK USER + TOTAL TIME
             */
            $total = dataDiferencaHorario($data['start'], $data['end']);
            $this->taskUserController->updateStatusAndTotal($time->task_user_id, $total, 'finish');

        }

        return 'Status incorreto';

    }

    public function checkCalcHours($taskUserId)
    {
        $dados = $this->repository->findByField('task_user_id', $taskUserId);
        if ($dados) {
            $total = null;
            $preTotal = [];
            foreach ($dados as $row) {
                $diferenca = dataDiferencaHorario($row['start'], $row['end']);
                $preTotal[] = $diferenca;
                $total = calculaHoras($total, $diferenca);
            }
            dd($preTotal, $total);
        }
    }

}
