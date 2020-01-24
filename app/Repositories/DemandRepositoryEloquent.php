<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\DemandRepository;
use AgenciaS3\Entities\Demand;
use AgenciaS3\Validators\DemandValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class DemandRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class DemandRepositoryEloquent extends BaseRepository implements DemandRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Demand::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DemandValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
