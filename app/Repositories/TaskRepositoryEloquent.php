<?php

namespace AgenciaS3\Repositories;

use Illuminate\Support\Carbon;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TaskRepository;
use AgenciaS3\Entities\Task;
use AgenciaS3\Validators\TaskValidator;

/**
 * Class TaskRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TaskRepositoryEloquent extends BaseRepository implements TaskRepository
{

    public function tasksByUser($user_id, $limit = null)
    {
        $dados = $this->orderBy('created_at', 'asc')
            ->scopeQuery(function ($query) use ($user_id) {
                $query = $query->leftjoin('task_users as tu', 'tu.task_id', '=', 'tasks.id')
                    ->select('tasks.*')
                    ->where('tu.user_id', '=', $user_id);

                return $query;
            });

        if ($limit) {
            return $dados->paginate($limit);
        } else {
            return $dados->paginate();
        }
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Task::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TaskValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
