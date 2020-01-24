<?php

namespace AgenciaS3\Criteria\SocialMedia;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByPitCriteria implements CriteriaInterface
{

    private $pit;

    public function __construct($pit)
    {
        $this->pit = $pit;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->pit)) {
            return $model->where('pit', $this->pit);
        }

        return $model;
    }
}
