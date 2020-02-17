<?php

namespace AgenciaS3\Criteria\Task;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByTaskIdCriteria implements CriteriaInterface
{

    private $task_id;

    public function __construct($task_id)
    {
        $this->task_id = $task_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->task_id)) {
            return $model->where('task_id', $this->task_id);
        }

        return $model;
    }
}
