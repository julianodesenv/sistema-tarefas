<?php

namespace AgenciaS3\Criteria\Order;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByOrderStatusIdCriteria implements CriteriaInterface
{

    private $status_id;

    public function __construct($status_id)
    {
        $this->status_id = $status_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->status_id)) {
            return $model->where('status_id', $this->status_id);
        }

        return $model;
    }
}