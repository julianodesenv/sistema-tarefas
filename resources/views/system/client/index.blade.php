@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
    <a href="{{ route('system.client.create') }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                @include('system.client._form_filter')
                @include('system.layouts.form._form_alerts')
                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate dataTable text-wrap" data-plugin="dataTable">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th class="text-center">Ativo</th>
                            <th class="text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="Nome">{{ $row->name }}</td>
                                <td data-title="Tipo">@if($row->type == 'pj') PJ @else PF @endif</td>
                                <td data-title="Ativo" class="text-center">{{ $row->active }}</td>
                                <td data-title="Ação" class="text-center">
                                    <a href="{{ route('system.client.user.index', $row->id) }}" title="Usuários" class="btn btn-icon btn-default btn-outline"><i class="icon wb-user" aria-hidden="true"></i></a>
                                    <a href="{{ route('system.client.service.index', $row->id) }}" title="Serviços" class="btn btn-icon btn-default btn-outline"><i class="icon fa-list-ul" aria-hidden="true"></i></a>
                                    <a href="{{ route('system.client.domain.index', $row->id) }}" title="Acessos" class="btn btn-icon btn-default btn-outline"><i class="icon wb-settings" aria-hidden="true"></i></a>
                                    <a href="{{ route('system.client.contact.index', $row->id) }}" title="Contatos" class="btn btn-icon btn-default btn-outline"><i class="icon wb-users" aria-hidden="true"></i></a>
                                    <a href="{{ route('system.client.edit', $row->id) }}" title="Alterar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.client.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
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
