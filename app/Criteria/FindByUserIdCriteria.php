<?php

namespace AgenciaS3\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByUserIdCriteria implements CriteriaInterface
{

    private $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->user_id)) {
            return $model->where('user_id', $this->user_id);
        }

        return $model;
    }
}