<?php

namespace AgenciaS3\Criteria\Task;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByTaskSectorIdCriteria implements CriteriaInterface
{

    private $sector_id;

    public function __construct($sector_id)
    {
        $this->sector_id = $sector_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->sector_id)) {
            return $model->whereHas('task', function ($query) {
                $query->where('sector_id', $this->sector_id);
            });
        }

        return $model;
    }
}
