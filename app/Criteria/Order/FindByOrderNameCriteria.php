<?php

namespace AgenciaS3\Criteria\Order;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByOrderNameCriteria implements CriteriaInterface
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->name)) {
            return $model->whereHas('client', function ($query) {
                $query->where('name', 'LIKE', "%{$this->name}%");
            });
        }

        return $model;
    }
}