<?php

namespace AgenciaS3\Criteria\Task;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByProjectIdCriteria implements CriteriaInterface
{

    private $project_id;

    public function __construct($project_id)
    {
        $this->project_id = $project_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->project_id)) {
            return $model->where('project_id', $this->project_id);
        }

        return $model;
    }
}
