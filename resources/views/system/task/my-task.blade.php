@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
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
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate">
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
                                <td data-title="#">{{ $row->task_id }}</td>
                                <td data-title="Ação" class="text-center actionTask" data-task-user-id="{{ $row->id }}">
                                    <a href="javascript:void(0);" title="Visualizar" class="btn btn-icon btn-default btn-outline btnTaskShow"><i class="icon wb-zoom-in" aria-hidden="true"></i></a>
                                    @if($row->status == 'pause')
                                    <a href="javascript:void(0);" title="Iniciar" class="btn btn-icon btn-default btn-outline btnTaskPlay"><i class="icon wb-play" aria-hidden="true"></i></a>
                                    @endif
                                    @if($row->status == 'play')
                                    <a href="javascript:void(0);" title="Pausar" class="btn btn-icon btn-default btn-outline btnTaskPause"><i class="icon wb-pause" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" title="Finalizar" class="btn btn-icon btn-default btn-outline btnTaskFinish"><i class="icon wb-check" aria-hidden="true"></i></a>
                                    @endif
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
