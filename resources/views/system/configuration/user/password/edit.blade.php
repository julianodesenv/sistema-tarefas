@extends('system.layouts.app')
@section('content')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <?php $route_back = route('system.configuration.user.edit', $dados->id); ?>
                @include('system.configuration.user.inc.menu', ['route_id' => $dados->id])
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('system.configuration.user.password.generatePassword', $dados->id) }}" class="mb-xs mt-xs mr-xs btn btn-success">
                            <i class="fa fa-undo"></i> Gerar senha automática
                        </a>
                    </div>
                </div>
                @include('system.layouts.form._form_alerts')
                {{ Form::model($dados, ['route' => ['system.configuration.user.password.update', $dados->id], 'method' => 'PUT', 'files'=> true]) }}
                <h3>{{ $dados->name }}</h3>
                @include('system.configuration.user.password._form')
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
