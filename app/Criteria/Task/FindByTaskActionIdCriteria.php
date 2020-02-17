<?php

namespace AgenciaS3\Criteria\Task;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByTaskActionIdCriteria implements CriteriaInterface
{

    private $action_id;

    public function __construct($action_id)
    {
        $this->action_id = $action_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->action_id)) {
            return $model->whereHas('task', function ($query) {
                $query->where('action_id', $this->action_id);
            });
        }

        return $model;
    }
}
