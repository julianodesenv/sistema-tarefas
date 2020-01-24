<?php


namespace AgenciaS3\Services;


use AgenciaS3\Entities\ClientUser;
use AgenciaS3\Entities\UserManager;

class UserService
{

    public function getSectors($sectors)
    {
        $html = '';
        if ($sectors) {
            $cont = 0;
            foreach ($sectors as $sector) {
                if (isset($sector->sector->name)) {
                    $cont++;
                    if ($cont > 2) {
                        $html .= ', ';
                    }
                    $html .= $sector->sector->name;
                }
            }
        }

        return $html;
    }

    public function getClientUserManager($user_id)
    {
        $users = UserManager::where('manager_id', $user_id)->get();
        $clients = [];
        if ($users) {
            foreach ($users as $row) {
                $c = ClientUser::where('user_id', $row->user_id)->get();
                if ($c) {
                    foreach ($c as $item) {
                        if (!in_array($item->client_id, $clients)) {
                            $clients[] = $item->client_id;
                        }
                    }
                }
            }
        }

        return $clients;
    }

}
