<?php

namespace AgenciaS3\Criteria\Task;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByTaskStartEndDateCriteria implements CriteriaInterface
{

    private $from;

    private $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isset($this->from) && isset($this->to)) {
            return $model->whereHas('task', function ($query) {
                $query->where('start_date', '>=', date('Y-m-d', strtotime(str_replace('/', '-', $this->from))) . ' 00:00:00')
                    ->where('end_date', '<=', date('Y-m-d', strtotime(str_replace('/', '-', $this->to))) . ' 23:59:59');
            });
        }

        return $model;
    }
}
