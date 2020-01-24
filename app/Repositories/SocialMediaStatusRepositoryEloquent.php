<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\SocialMediaStatusRepository;
use AgenciaS3\Entities\SocialMediaStatus;
use AgenciaS3\Validators\SocialMediaStatusValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class SocialMediaStatusRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class SocialMediaStatusRepositoryEloquent extends BaseRepository implements SocialMediaStatusRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SocialMediaStatus::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SocialMediaStatusValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
