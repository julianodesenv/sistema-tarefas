@extends('system.layouts.app')
@section('content')
    @include('system.task.inc._modal_show')
    @include('system.task.inc._modal_pause')
    @include('system.task.inc._modal_finish')
    <a href="{{ route('system.task.create') }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                @include('system.task._form_filter')
                @include('system.layouts.form._form_alerts')
                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate wrapper">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Ação</th>
                                <th class="text-center">Prazo</th>
                                <th class="text-center">Prioridade</th>
                                <th>Cliente</th>
                                <th>Projeto / Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="#">{{ $row->task_id. ' | '. $row->status.' | '.$row->id }}</td>
                                <td data-title="Ação" id="action-{{ $row->id }}" class="text-center actionTask" data-task-id="{{ $row->task_id }}" data-task-user-id="{{ $row->id }}">
                                    @include('system.task.inc._actions')
                                </td>
                                <td data-title="Prazo" class="text-center">{{ mysql_to_data($row->task->end_date) }}</td>
                                <td data-title="Prioridade" class="text-center">
                                    <span class="badge mr-5 mb-5 white" style="background: {{ $row->task->priority->color }};">
                                        {{ $row->task->priority->name }}
                                    </span>
                                </td>
                                <td data-title="Cliente">{{ $row->task->client->name }}</td>
                                <td data-title="Usuários">
                                    Projeto / {{ $row->task->action->name }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
