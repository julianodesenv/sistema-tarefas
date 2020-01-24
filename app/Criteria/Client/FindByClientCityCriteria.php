<?php

namespace AgenciaS3\Criteria\Client;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByClientCityCriteria implements CriteriaInterface
{

    private $city_id;

    public function __construct($city_id)
    {
        $this->city_id = $city_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->city_id)) {
            return $model->whereHas('addresses', function ($query) {
                $query->where('city_id', $this->city_id);
            });
        }

        return $model;
    }
}