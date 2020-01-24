<?php

namespace AgenciaS3\Criteria\SocialMedia;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByServiceCriteria implements CriteriaInterface
{

    private $service_id;

    public function __construct($service_id)
    {
        $this->service_id = $service_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->service_id)) {
            return $model->whereHas('services', function ($query) {
                $query->where('service_id', $this->service_id);
            });
        }

        return $model;
    }
}
