<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TaskTimeRepository;
use AgenciaS3\Entities\TaskTime;
use AgenciaS3\Validators\TaskTimeValidator;

/**
 * Class TaskTimeRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TaskTimeRepositoryEloquent extends BaseRepository implements TaskTimeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TaskTime::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TaskTimeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
