<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\SocialMediaPostServiceRepository;
use AgenciaS3\Entities\SocialMediaPostService;
use AgenciaS3\Validators\SocialMediaPostServiceValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class SocialMediaPostServiceRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class SocialMediaPostServiceRepositoryEloquent extends BaseRepository implements SocialMediaPostServiceRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SocialMediaPostService::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SocialMediaPostServiceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
