<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TaskProjectTemplateRepository;
use AgenciaS3\Entities\TaskProjectTemplate;
use AgenciaS3\Validators\TaskProjectTemplateValidator;

/**
 * Class TaskProjectTemplateRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TaskProjectTemplateRepositoryEloquent extends BaseRepository implements TaskProjectTemplateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TaskProjectTemplate::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TaskProjectTemplateValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
