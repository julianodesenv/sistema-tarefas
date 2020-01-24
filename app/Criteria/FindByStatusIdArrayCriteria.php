<?php

namespace AgenciaS3\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByStatusIdArrayCriteria implements CriteriaInterface
{

    private $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (is_array($this->status)) {
            $cont = 0;
            $total = count($this->status);
            $ids = null;
            foreach($this->status as $row){
                $cont++;
                $ids .= $row;
                if($cont < $total){
                    $ids .= '|';
                }
            }
			if($total > 1){
				$model = $model->where('status_id', 'RLIKE', $ids);
			}else{
				$model = $model->where('status_id', $ids);
			}
        }

        return $model;
    }
}
