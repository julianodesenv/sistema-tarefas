<?php

namespace AgenciaS3\Criteria\Product;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByCategoryCriteria implements CriteriaInterface
{

    private $category_id;

    public function __construct($category_id)
    {
        $this->category_id = $category_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->category_id)) {
            return $model->whereHas('categories', function ($query) {
                $query->where('category_id', $this->category_id);
            });
        }

        return $model;
    }
}