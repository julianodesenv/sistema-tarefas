@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
    <a href="{{ route('system.schedule.create') }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                @include('system.schedule._form_filter')
                @include('system.layouts.form._form_alerts')
                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">Data</th>
                            <th>Título</th>
                            <th>Usuários</th>
                            <th class="text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="#">{{ $row->id }}</td>
                                <td data-title="Data" class="text-center">{{ mysql_to_data($row->date, true, false) }}</td>
                                <td data-title="Título">{{ $row->name }}</td>
                                <td data-title="Usuários">
                                    @if($row->users)
                                        @foreach($row->users as $user)
                                            {{ $user->user->name.', ' }}
                                        @endforeach
                                    @endif
                                </td>
                                <td data-title="Ação" class="text-center">
                                    <a href="{{ route('system.schedule.user.index', $row->id) }}" title="Usuários" class="btn btn-icon btn-default btn-outline"><i class="icon wb-user" aria-hidden="true"></i></a>
                                    <a href="{{ route('system.schedule.edit', $row->id) }}" title="Alterar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.schedule.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
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
