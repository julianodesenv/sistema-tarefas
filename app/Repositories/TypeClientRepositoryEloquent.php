<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TypeClientRepository;
use AgenciaS3\Entities\TypeClient;
use AgenciaS3\Validators\TypeClientValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class TypeClientRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TypeClientRepositoryEloquent extends BaseRepository implements TypeClientRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TypeClient::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TypeClientValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
