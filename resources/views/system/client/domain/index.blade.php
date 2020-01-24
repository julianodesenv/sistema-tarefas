@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
    <a href="{{ route('system.client.domain.create', $client_id) }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <?php $route_back = route('system.client.edit', $client_id); ?>
                @include('system.client.inc.menu', ['route_id' => $client_id])
                @include('system.layouts.form._form_alerts')
                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate dataTable" data-plugin="dataTable">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th class="text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="Nome">{{ $row->name }}</td>
                                <td data-title="Ação" class="text-center">
                                    <a href="{{ route('system.client.domain.text.index', ['client_id' => $client_id, 'id' => $row->id]) }}" title="Registros" class="btn btn-icon btn-default btn-outline"><i class="icon wb-text" aria-hidden="true"></i></a>
                                    <a href="{{ route('system.client.domain.edit', $row->id) }}" title="Alterar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.client.domain.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
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
