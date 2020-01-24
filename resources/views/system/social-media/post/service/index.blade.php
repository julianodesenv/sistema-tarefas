@extends('system.layouts.app')
@section('content')
    @include('system.layouts.modal._form_destroy')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <?php $route_back = route('system.social-media.post.edit', $post_id); ?>
                @include('system.social-media.post.inc.menu', ['route_id' => $post_id])
                @include('system.layouts.form._form_alerts')

                {{ Form::open(['route' => 'system.social-media.post.service.store', 'files'=> true]) }}
                    @include('system.social-media.post.service._form')

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon wb-plus"></i>
                                Adicionar
                            </button>
                        </div>
                    </div>
                {{ Form::close() }}

                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                    <hr />
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate">
                        <thead>
                        <tr>
                            <th>Serviço</th>
                            <th class="text-center">Impulsionamento</th>
                            <th class="text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td data-title="Serviço">@if(isset($row->service->name)){{ $row->service->name }}@endif</td>
                                <td data-title="Impulsionamento" class="text-center">R$ {{ formata_valor($row->value) }}</td>
                                <td data-title="Ação" class="text-center">
                                    <a href="{{ route('system.social-media.post.service.edit', $row->id) }}" title="Alterar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.social-media.post.service.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
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
