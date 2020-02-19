<?php

namespace AgenciaS3\Repositories;

use AgenciaS3\Entities\Notification;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class NotificationRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class NotificationRepositoryEloquent extends BaseRepository implements NotificationRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Notification::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
