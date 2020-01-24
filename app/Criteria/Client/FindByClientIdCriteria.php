<?php

namespace AgenciaS3\Criteria\Client;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByClientIdCriteria implements CriteriaInterface
{

    private $client_id;

    public function __construct($client_id)
    {
        $this->client_id = $client_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->client_id)) {
            return $model->where('client_id', $this->client_id);
        }

        return $model;
    }
}
