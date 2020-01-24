@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <?php $route_back = route('system.configuration.user.edit', $user_id); ?>
                @include('system.configuration.user.inc.menu', ['route_id' => $user_id])
                @include('system.layouts.form._form_alerts')

                @include('system.configuration.user.manager._form')

                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                    <hr />
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate dataTable" data-plugin="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Gerente</th>
                            <th>E-mail</th>
                            <th class="text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="#">{{ $row->id }}</td>
                                <td data-title="Gerente">@if(isset($row->manager->name)){{ $row->manager->name }}@endif</td>
                                <td data-title="E-mail">@if(isset($row->manager->email)){{ $row->manager->email }}@endif</td>
                                <td data-title="Ação" class="text-center">
                                    <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.configuration.user.manager.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
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
