<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TaskUserRepository;
use AgenciaS3\Entities\TaskUser;
use AgenciaS3\Validators\TaskUserValidator;

/**
 * Class TaskUserRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TaskUserRepositoryEloquent extends BaseRepository implements TaskUserRepository
{
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
