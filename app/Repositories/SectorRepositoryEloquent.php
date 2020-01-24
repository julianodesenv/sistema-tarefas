<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\SectorRepository;
use AgenciaS3\Entities\Sector;
use AgenciaS3\Validators\SectorValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class SectorRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class SectorRepositoryEloquent extends BaseRepository implements SectorRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sector::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return SectorValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
