@extends('system.layouts.app')
@section('content')
    @inject("taskManager", "\AgenciaS3\Http\Controllers\System\Task\TaskManagerController")
    @include('system.task.inc._modal_show')
    @include('system.task.inc._modal_edit_users')
    <a href="{{ route('system.task.create') }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
    @if($users->isEmpty())
    @else
        <div class="row">
            @foreach($users as $user)
                <?php  $tasks = $taskManager->getTasksUser($user->user_id); ?>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $user->user->name }}
                            <span class="badge badge-pill badge-info">{{ count($tasks) }}</span>
                        </h3>
                    </div>
                    @if($tasks->isEmpty())
                        @include('system.layouts.form._no_record')
                    @else
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate wrapper">
                        <thead>
                            <tr>
                                <th class="text-center">PIT</th>
                                <th class="text-center">Prazo</th>
                                <th class="text-center">Prioridade</th>
                                <th>Cliente</th>
                                <th>Projeto</th>
                                <th class="text-center">Ação</th>
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
                                    <td data-title="PIT" class="text-center">{{ $row->task_id }}</td>
                                    <td data-title="Prazo" class="text-center {{ $classLateTerm }}">{{ mysql_to_data($row->task->end_date) }}</td>
                                    <td data-title="Prioridade" class="text-center">
                                    <span class="badge mr-5 mb-5 white" style="background: {{ $row->task->priority->color }};">
                                        {{ $row->task->priority->name }}
                                    </span>
                                    </td>
                                    <td data-title="Cliente">{{ $row->task->client->name }}</td>
                                    <td data-title="Projeto">{{ $row->task->project->name }}</td>
                                    <td data-title="Ação" id="action-{{ $row->id }}" class="text-center actionTask" data-task-id="{{ $row->task_id }}" data-task-user-id="{{ $row->id }}">
                                        <a href="javascript:void(0);" title="Visualizar" data-toggle="modal" data-target="#taskShow" class="btn btn-icon btn-default btn-outline btnTaskShow"><i class="icon wb-zoom-in" aria-hidden="true"></i></a>
                                        <a href="javascript:void(0);" title="Usuários" data-toggle="modal" data-target="#taskEditUser" class="btn btn-icon btn-default btn-outline btnTaskEditUsers"><i class="icon wb-users" aria-hidden="true"></i></a>
                                        <a href="{{ route('system.task.edit', $row->task_id) }}" title="Alterar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @endif
    </div>
@endsection
