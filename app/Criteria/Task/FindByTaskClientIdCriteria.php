<?php

namespace AgenciaS3\Criteria\Task;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByTaskClientIdCriteria implements CriteriaInterface
{

    private $client_id;

    public function __construct($client_id)
    {
        $this->client_id = $client_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->client_id)) {
            return $model->whereHas('task', function ($query) {
                $query->where('client_id', $this->client_id);
            });
        }

        return $model;
    }
}
