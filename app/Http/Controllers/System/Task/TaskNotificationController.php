<?php


namespace AgenciaS3\Http\Controllers\System\Task;


use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Notifications\System\TaskNotification;
use Notification;

class TaskNotificationController extends Controller
{

    public function create($dados)
    {
        $message = 'Nova tarefa #' . $dados->task_id;
        $route = route('system.task.show', $dados->task_id);
        Notification::send($dados->user, (new TaskNotification($dados->id, $message, $route)));
    }

    public function finish($dados)
    {
        $message = 'Tarefa #' . $dados->taskUser->task_id . ' finalizada por ' . $dados->taskUser->user->name;
        $route = route('system.task.show', ['id' => $dados->taskUser->task_id, 'task_user_id' => $dados->task_user_id]);

        Notification::send($dados->taskUser->task->responsible, (new TaskNotification($dados->id, $message, $route)));
    }

}