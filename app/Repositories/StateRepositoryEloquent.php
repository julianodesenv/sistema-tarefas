<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\StateRepository;
use AgenciaS3\Entities\State;
use AgenciaS3\Validators\StateValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class StateRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class StateRepositoryEloquent extends BaseRepository implements StateRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return State::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StateValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
