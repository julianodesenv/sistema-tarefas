<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\UserSectorRepository;
use AgenciaS3\Entities\UserSector;
use AgenciaS3\Validators\UserSectorValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class UserSectorRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class UserSectorRepositoryEloquent extends BaseRepository implements UserSectorRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserSector::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserSectorValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
