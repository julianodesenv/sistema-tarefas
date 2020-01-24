<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\UserRoleRepository;
use AgenciaS3\Entities\UserRole;
use AgenciaS3\Validators\UserRoleValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class UserRoleRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class UserRoleRepositoryEloquent extends BaseRepository implements UserRoleRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserRole::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserRoleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
