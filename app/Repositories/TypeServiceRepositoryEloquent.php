<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TypeServiceRepository;
use AgenciaS3\Entities\TypeService;
use AgenciaS3\Validators\TypeServiceValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class TypeServiceRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TypeServiceRepositoryEloquent extends BaseRepository implements TypeServiceRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TypeService::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TypeServiceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
