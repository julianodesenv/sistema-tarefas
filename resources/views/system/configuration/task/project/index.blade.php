@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
    <a href="{{ route('system.configuration.task.project.create') }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                @include('system.layouts.form._form_alerts')
                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                <table class="table table-hover table-no-more table-striped mb-0 text-truncate">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Cliente</th>
                            <th class="text-center">Data Início</th>
                            <th class="text-center">Data Previsão</th>
                            <th class="text-center">Data Conclusão</th>
                            <th class="text-center">Ativo</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dados as $row)
                    <tr>
                        <td data-title="#">{{ $row->id }}</td>
                        <td data-title="Nome">{{ $row->name }}</td>
                        <td data-title="Cliente">{{ $row->client->name }}
                        <td data-title="Data Início" class="text-center">{{ mysql_to_data($row->start_date) }}</td>
                        <td data-title="Data Previsão" class="text-center">{{ mysql_to_data($row->end_date_forecast) }}</td>
                        <td data-title="Data Conclusão" class="text-center">@if(isPost($row->enda_date)){{ mysql_to_data($row->enda_date) }}@else - @endif</td>
                        <td data-title="Ação" class="text-center">
                            <a href="{{ route('system.configuration.task.project.edit', $row->id) }}" title="Alterar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                            <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.configuration.task.project.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $dados->links() !!}
                @endif
            </div>
        </div>
    </div>
@endsection
