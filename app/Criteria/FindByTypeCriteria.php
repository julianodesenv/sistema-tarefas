<?php

namespace AgenciaS3\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByTypeCriteria implements CriteriaInterface
{

    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->type)) {
            return $model->where('type', $this->type);
        }

        return $model;
    }
}