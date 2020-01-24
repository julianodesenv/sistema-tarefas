@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
    <a href="{{ route('system.configuration.user.create') }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                @include('system.layouts.form._form_alerts')
                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                <table class="table table-hover table-no-more table-striped mb-0 text-truncate dataTable" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Nível</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dados as $row)
                    <tr>
                        <td data-title="Nome">{{ $row->name }}</td>
                        <td data-title="E-mail">{{ $row->email }}</td>
                        <td data-title="Nível">{{ $row->role->name }}</td>
                        <td data-title="Ação" class="text-center">
                            @if($row->role_id == 3)
                                <a href="{{ route('system.configuration.user.manager.index', $row->id) }}" title="Gerente" class="btn btn-icon btn-default btn-outline"><i class="icon fa-user" aria-hidden="true"></i></a>
                            @endif
                            <a href="{{ route('system.configuration.user.sector.index', $row->id) }}" title="Setor" class="btn btn-icon btn-default btn-outline"><i class="icon fa-chain-broken" aria-hidden="true"></i></a>
                            <a href="{{ route('system.configuration.user.password.edit', $row->id) }}" title="Alterar Senha" class="btn btn-icon btn-default btn-outline"><i class="icon fa-key" aria-hidden="true"></i></a>
                            <a href="{{ route('system.configuration.user.edit', $row->id) }}" title="Alterar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                            <!--
                            <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.configuration.user.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
                            -->
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
