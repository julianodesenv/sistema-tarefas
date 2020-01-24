<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TaskPriorityRepository;
use AgenciaS3\Entities\TaskPriority;
use AgenciaS3\Validators\TaskPriorityValidator;

/**
 * Class TaskPriorityRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TaskPriorityRepositoryEloquent extends BaseRepository implements TaskPriorityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TaskPriority::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TaskPriorityValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
