<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TaskProjectRepository;
use AgenciaS3\Entities\TaskProject;
use AgenciaS3\Validators\TaskProjectValidator;

/**
 * Class TaskProjectRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TaskProjectRepositoryEloquent extends BaseRepository implements TaskProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TaskProject::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TaskProjectValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
