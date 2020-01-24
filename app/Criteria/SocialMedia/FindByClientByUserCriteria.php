<?php

namespace AgenciaS3\Criteria\SocialMedia;

use AgenciaS3\Entities\ClientUser;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByClientByUserCriteria implements CriteriaInterface
{

    private $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        $clients = ClientUser::where('user_id', $this->user_id)->get();
        if ($clients) {
            $ids = null;
            foreach ($clients as $row) {
                $ids[] = $row->client_id;
            }

            $model = $model->whereIn('client_id', $ids);
        }

        return $model;
    }
}
