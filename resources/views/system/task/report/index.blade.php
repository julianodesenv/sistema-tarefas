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
                @include('system.layouts.form._form_alerts')
                @include('system.task.report._form_filter')
                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate wrapper">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Projeto / Setor / Ação </th>
                                <th class="text-center">Entrada</th>
                                <th class="text-center">Prazo</th>
                                <th class="text-center">Início</th>
                                <th class="text-center">Conclusão</th>
                                <th class="text-center">Detalhes</th>
                                <th>Responsável</th>
                                <th>Usuário</th>
                                <th>Total Hrs</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = '00:00:00'; ?>
                        @foreach($dados as $row)
                            <?php
                            $total = calculaHoras($total, $row->total) ;
                            $dateStart = null;
                            $dateEnd = null;
                            $timesFirst = $row->times->first();
                            if($timesFirst){
                                $dateStart = $timesFirst->start;
                            }
                            $timesEnd = $row->times->where('status', 'finish')->last();
                            if($timesEnd){
                                $dateEnd = $timesEnd->end;
                            }
                            ?>
                            <tr>
                                <td>{{ $row->task_id }}</td>
                                <td>{{ $row->task->client->name }}</td>
                                <td>{{ $row->task->project->name.' / '.$row->task->sector->name.' / '.$row->task->action->name }}</td>
                                <td class="text-center">{{ mysql_to_data($row->task->start_date) }}</td>
                                <td class="text-center">{{ mysql_to_data($row->task->end_date) }}</td>
                                <td class="text-center">@if(!is_null($dateStart)){{ mysql_to_data($dateStart, true, true) }}@endif</td>
                                <td class="text-center">@if(!is_null($dateEnd)){{ mysql_to_data($dateEnd, true, true) }}@endif</td>
                                <td class="text-center">
                                    LINK SHOW
                                </td>
                                <td>{{ $row->task->responsible->name }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ $row->total }}</td>
                            </tr>
                        @endforeach
                        <tr class="table-danger">
                            <td colspan="10" class="text-right">Total de Horas:</td>
                            <td class="text-center">
                                {{ $total }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
