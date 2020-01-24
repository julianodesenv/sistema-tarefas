<?php

namespace AgenciaS3\Criteria\SocialMedia;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByServiceIdArrayCriteria implements CriteriaInterface
{

    private $services;

    public function __construct($services)
    {
        $this->services = $services;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (is_array($this->services)) {
            $cont = 0;
            $total = count($this->services);
            $ids = null;
            foreach ($this->services as $row) {
                $cont++;
                $ids .= $row;
                if ($cont < $total) {
                    $ids .= '|';
                }
            }

            if ($total > 1) {
                $model = $model->whereHas('services', function ($query) use ($ids) {
                    $query->where('service_id', 'RLIKE', $ids);
                });
            } else {
                $model = $model->whereHas('services', function ($query) use ($ids) {
                    $query->where('service_id', $ids);
                });
            }
        }

        return $model;
    }
}
