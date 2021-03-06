@extends('system.layouts.app')
@section('content')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('system.client.contact.index', $client_id) }}" class="mb-xs mt-xs mr-xs btn btn-secondary">
                            <i class="fa fa-undo"></i> Voltar
                        </a>
                    </div>
                </div>
                @include('system.layouts.form._form_alerts')
                {{ Form::model($dados, ['route' => ['system.client.contact.update', $dados->id], 'method' => 'PUT', 'files'=> true]) }}
                @include('system.client.contact._form')
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="icon wb-plus"></i>
                            Salvar
                        </button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
