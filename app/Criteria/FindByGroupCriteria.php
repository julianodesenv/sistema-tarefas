<?php

namespace AgenciaS3\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByGroupCriteria implements CriteriaInterface
{

    private $group_id;

    public function __construct($group_id)
    {
        $this->group_id = $group_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {

        if (isPost($this->group_id)) {
            return $model->where('group_id', $this->group_id);
        }

        return $model;
    }
}