@inject("objNotification", "\AgenciaS3\Http\Controllers\System\Notification\NotificationController")
<?php $notifications = $objNotification->listHeader(); ?>
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false" data-animation="scale-up" role="button">
        <i class="icon wb-bell" aria-hidden="true"></i>
        <span class="badge badge-pill badge-danger up">{{ $notifications->total() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
        <div class="dropdown-menu-header">
            <h5>NOTIFICAÇÕES</h5>
            <span class="badge badge-round badge-danger">Novas {{ $notifications->total() }}</span>
        </div>
        <div class="list-group">
            <div data-role="container">
                <div data-role="content">
                    @if($notifications->isEmpty())
                    @else
                        @foreach($notifications as $row)
                            <?php $data = json_decode($row->data); ?>
                    <a class="list-group-item dropdown-item" href="{{ route('system.notification.view', $row->id) }}" role="menuitem">
                        <div class="media">
                            <div class="pr-10">
                                <i class="icon fa-tasks bg-red-600 white icon-circle" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">{{ $data->message }}</h6>
                                <time class="media-meta" datetime="2018-06-12T20:50:48+08:00">
                                    {{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                </time>
                            </div>
                        </div>
                    </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="dropdown-menu-footer">
            <a class="dropdown-item" href="{{ route('system.notification.index') }}" role="menuitem">
                Todas Notificações
            </a>
        </div>
    </div>
</li>