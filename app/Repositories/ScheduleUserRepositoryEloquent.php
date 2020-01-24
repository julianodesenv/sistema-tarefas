<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\ScheduleUserRepository;
use AgenciaS3\Entities\ScheduleUser;
use AgenciaS3\Validators\ScheduleUserValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class ScheduleUserRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class ScheduleUserRepositoryEloquent extends BaseRepository implements ScheduleUserRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ScheduleUser::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ScheduleUserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
