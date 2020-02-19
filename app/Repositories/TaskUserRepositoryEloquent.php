<?php

namespace AgenciaS3\Repositories;

use AgenciaS3\Entities\TaskUser;
use AgenciaS3\Validators\TaskUserValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class TaskUserRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TaskUserRepositoryEloquent extends BaseRepository implements TaskUserRepository
{

    public function getUserTaks($user_id, $limit = null)
    {
        $dados = $this->with(['task.client', 'task.project', 'task.sector', 'task.action', 'task.priority'])
            ->scopeQuery(function ($query) use ($user_id) {
                $query = $query->leftjoin('tasks as t', 't.id', '=', 'task_users.task_id')
                    ->leftjoin('task_priorities as tp', 'tp.id', '=', 't.priority_id')
                    ->select('task_users.*')
                    ->where('task_users.user_id', $user_id)
                    ->whereBetween('task_users.updated_at', [date('Y-m-d') . ' 00:00:00', date('Y-m-d') . ' 23:59:59'])
                    ->orWhere('status', 'play')
                    ->orWhere('status', 'pause')
                    ->orderBy('t.end_date', 'asc')
                    ->orderBy('tp.order', 'asc')
                    ->having('user_id', $user_id);

                return $query;
            });

        if ($limit) {
            return $dados->simplePaginate($limit);
        } else {
            return $dados->all();
        }
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TaskUser::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return TaskUserValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
