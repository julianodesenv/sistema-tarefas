@extends('system.layouts.app')
@section('content')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('system.schedule.index') }}" class="mb-xs mt-xs mr-xs btn btn-secondary">
                            <i class="fa fa-undo"></i> Voltar
                        </a>
                    </div>
                </div>
                @include('system.layouts.form._form_alerts')
                {{ Form::open(['route' => 'system.schedule.store', 'files'=> true]) }}
                @include('system.schedule._form')
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="icon wb-plus"></i>
                            Adicionar
                        </button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
