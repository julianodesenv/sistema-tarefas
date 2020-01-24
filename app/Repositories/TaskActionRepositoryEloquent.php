<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TaskActionRepository;
use AgenciaS3\Entities\TaskAction;
use AgenciaS3\Validators\TaskActionValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class TaskActionRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TaskActionRepositoryEloquent extends BaseRepository implements TaskActionRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TaskAction::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TaskActionValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
