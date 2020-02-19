@extends('system.layouts.app')
@section('content')
    @include('system.task.report.inc._modal_show')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                @include('system.layouts.form._form_alerts')
                @include('system.task.report._form_filter')
                @if(!$dados)
                    @include('system.layouts.form._no_record')
                @else
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate dataTable text-wrap" data-plugin="dataTable">
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
                                <td>{{ $row->task_id. ' | '.$row->id }}</td>
                                <td>{{ $row->task->client->name }}</td>
                                <td>{{ $row->task->project->name.' / '.$row->task->sector->name.' / '.$row->task->action->name }}</td>
                                <td class="text-center">{{ mysql_to_data($row->task->start_date) }}</td>
                                <td class="text-center">{{ mysql_to_data($row->task->end_date) }}</td>
                                <td class="text-center">@if(!is_null($dateStart)){{ mysql_to_data($dateStart, true, true) }}@endif</td>
                                <td class="text-center">@if(!is_null($dateEnd)){{ mysql_to_data($dateEnd, true, true) }}@endif</td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" data-id="{{ $row->id }}" title="Visualizar" data-toggle="modal" data-target="#taskShowReport" class="btn btn-icon bg-success btn-outline btnTaskShowReport"><i class="icon wb-zoom-in" aria-hidden="true"></i></a>
                                </td>
                                <td>{{ $row->task->responsible->name }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ $row->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate wrapper">
                        <tr class="table-danger danger">
                            <td class="text-right">Total de Horas: {{ $total }}</td>
                        </tr>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
