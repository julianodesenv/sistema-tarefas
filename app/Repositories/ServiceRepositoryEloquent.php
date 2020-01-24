<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\ServiceRepository;
use AgenciaS3\Entities\Service;
use AgenciaS3\Validators\ServiceValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class ServiceRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class ServiceRepositoryEloquent extends BaseRepository implements ServiceRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Service::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ServiceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
