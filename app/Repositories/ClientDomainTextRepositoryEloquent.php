<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\ClientDomainTextRepository;
use AgenciaS3\Entities\ClientDomainText;
use AgenciaS3\Validators\ClientDomainTextValidator;
use Prettus\Repository\Traits\CacheableRepository;
use Prettus\Repository\Contracts\CacheableInterface;

/**
 * Class ClientDomainTextRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class ClientDomainTextRepositoryEloquent extends BaseRepository implements ClientDomainTextRepository, CacheableInterface
{
    use CacheableRepository;


    protected $fieldSearchable = [
        'name' => 'like',
        'description' => 'like'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ClientDomainText::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ClientDomainTextValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
