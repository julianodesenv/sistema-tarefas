@extends('system.layouts.app')
@section('content')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <?php $route_back = route('system.schedule.index'); ?>
                @include('system.schedule.inc.menu', ['route_id' => $dados->id])
                @include('system.layouts.form._form_alerts')
                {{ Form::model($dados, ['route' => ['system.schedule.update', $dados->id], 'method' => 'PUT', 'files'=> true]) }}
                @include('system.schedule._form')
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
