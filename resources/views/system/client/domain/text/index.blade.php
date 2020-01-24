@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
    <a href="{{ route('system.client.domain.text.create', ['client_id' => $client_id, 'id' => $domain_id]) }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 mb-3 text-right">
                        <a href="{{ route('system.client.domain.index', $client_id) }}" class="mb-xs mt-xs mr-xs btn btn-secondary">
                            <i class="fa fa-undo"></i> Voltar
                        </a>
                    </div>
                </div>
                @include('system.client.domain.text._form_filter')
                @include('system.layouts.form._form_alerts')
                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate dataTable" data-plugin="dataTable">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th class="text-center">Ordem</th>
                            <th class="text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="Nome">{{ $row->name }}</td>
                                <td data-title="Ordem" class="text-center">{{ $row->order }}</td>
                                <td data-title="Ação" class="text-center">
                                    <a href="{{ route('system.client.domain.text.edit', ['client_id' => $client_id, 'id' => $row->id]) }}" title="Alterar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.client.domain.text.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
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
