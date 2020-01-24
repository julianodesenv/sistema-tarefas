<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\UserManagerRepository;
use AgenciaS3\Entities\UserManager;
use AgenciaS3\Validators\UserManagerValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class UserManagerRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class UserManagerRepositoryEloquent extends BaseRepository implements UserManagerRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserManager::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserManagerValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
