<?php

namespace AgenciaS3\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByStatusIdCriteria implements CriteriaInterface
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
