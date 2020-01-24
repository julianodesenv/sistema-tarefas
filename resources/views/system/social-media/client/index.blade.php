@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
    <a href="{{ route('system.social-media.post.create') }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <h3>{{ $client->name }}</h3>
                @include('system.social-media.client._form_filter')
                @include('system.layouts.form._form_alerts')
                <div class="col-md-12 text-right mb-md-3">
                    <a href="{{ route('system.social-media.client.export', $client->id).$config['route']['queryString'] }}" title="Limpar" class="btn btn-warning mb-md"><i class="fa fa-file-excel-o"></i> Exportar</a>
                </div>
                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                <table class="table table-hover table-no-more table-striped mb-0 text-truncate dataTable" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Nome</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Redes</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dados as $row)
                    <tr>
                        <td data-title="Data">{{ mysql_to_data($row->date) }}</td>
                        <td data-title="Nome">{{ $row->name }}</td>
                        <td data-title="Status" class="text-center">
                            <span class="badge mr-5 mb-5 white" style="background: {{ $row->status->color }};">
                                {{ $row->status->name }}
                            </span>
                        </td>
                        <td data-title="Redes" class="text-center">
                            @if($row->services)
                                {!! socialMediaIcons($row->services) !!}
                            @endif
                        </td>
                        <td data-title="Ação" class="text-center">
                            <a href="{{ route('system.social-media.post.service.index', $row->id) }}" title="Serviços" class="btn btn-icon btn-default btn-outline"><i class="icon fa-gear" aria-hidden="true"></i></a>
                            <a href="{{ route('system.social-media.post.edit', $row->id) }}" title="Alterar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                            <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.social-media.post.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
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
