@extends('system.layouts.app')
@section('content')
    @inject("taskManager", "\AgenciaS3\Http\Controllers\System\Task\TaskManagerController")
    <a href="{{ route('system.task.create') }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
    @if($users->isEmpty())
    @else
        <div class="row">
            @foreach($users as $user)
                <?php  $tasks = $taskManager->getTasksUser($user->user_id); ?>
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $user->user->name }}
                            <span class="badge badge-pill badge-info">{{ count($tasks) }}</span>
                        </h3>
                    </div>
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate wrapper">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Prazo</th>
                                <th class="text-center">Prioridade</th>
                                <th>Cliente</th>
                                <th class="text-center">Projeto</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $row)
                                <?php
                                $classLateTerm = '';
                                if($row->task->end_date <= date('Y-m-d')){
                                    $classLateTerm = 'alert-danger';
                                }
                                ?>
                                <tr>
                                    <td data-title="#">{{ $row->task_id }}</td>
                                    <td data-title="Prazo" class="text-center {{ $classLateTerm }}">{{ mysql_to_data($row->task->end_date) }}</td>
                                    <td data-title="Prioridade" class="text-center">
                                    <span class="badge mr-5 mb-5 white" style="background: {{ $row->task->priority->color }};">
                                        {{ $row->task->priority->name }}
                                    </span>
                                    </td>
                                    <td data-title="Cliente">{{ $row->task->client->name }}</td>
                                    <td data-title="Projeto">{{ $row->task->project->name }}</td>
                                    <td data-title="Ação">
                                        view | Edit
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    @endif
    </div>
@endsection
