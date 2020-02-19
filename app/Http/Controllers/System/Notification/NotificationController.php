<?php

namespace AgenciaS3\Http\Controllers\System\Notification;

use AgenciaS3\Entities\User;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\NotificationRepository;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{

    protected $repository;

    public function __construct(NotificationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $user_id = Auth::user()->id;
        $dados = $this->repository->orderBy('created_at', 'desc')->scopeQuery(function ($query) use ($user_id) {
            return $query->where('notifiable_id', $user_id);
        })->paginate();

        return view('system.notification.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Notificações";
        $config['activeMenu'] = 'notification';
        $config['titleMenu'] = 'Notificações';

        return $config;
    }

    public function view($id)
    {
        if ($id) {
            $dados = $this->repository->findByField('id', $id)->first();
            if ($dados) {
                $data = json_decode($dados->data);

                $nUser = User::find($data->user_id);
                $nUser->notifications->find($id)->markAsRead();
                //$dados->notifications->find($id)->markAsRead();

                if (isset($data->route)) {
                    return redirect($data->route);
                }

                return redirect(route('system.notification.index'));
            }

            //$nUser->notifications->find($notification->id)->markAsRead();
        }

        return redirect(route('system.notification.index'), 301);
    }

    public function listHeader()
    {
        $user_id = Auth::user()->id;
        return $this->repository->orderBy('created_at', 'desc')->scopeQuery(function ($query) use ($user_id) {
            return $query->where('notifiable_id', $user_id)->where('read_at', null);
        })->paginate();
    }

}
