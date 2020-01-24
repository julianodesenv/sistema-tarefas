<?php

namespace AgenciaS3\Criteria\Order;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByOrderEmailCriteria implements CriteriaInterface
{

    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->email)) {
            return $model->whereHas('client', function ($query) {
                $query->where('email', 'LIKE', "%{$this->email}%");
            });
        }

        return $model;
    }
}