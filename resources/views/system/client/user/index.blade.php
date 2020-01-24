@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <?php $route_back = route('system.client.edit', $client_id); ?>
                @include('system.client.inc.menu', ['route_id' => $client_id])
                @include('system.layouts.form._form_alerts')

                @include('system.client.user._form')

                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                    <hr />
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate dataTable" data-plugin="dataTable">
                        <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Setor</th>
                            <th>Nível</th>
                            <th class="text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="Usuário">@if(isset($row->user->name)){{ $row->user->name }}@endif</td>
                                <td data-title="Setor">{!! (new \AgenciaS3\Services\UserService)->getSectors($row->user->sectors) !!}</td>
                                <td data-title="Nível">@if(isset($row->user->role->name)){{ $row->user->role->name }}@endif</td>
                                <td data-title="Ação" class="text-center">
                                    <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.client.user.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
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
