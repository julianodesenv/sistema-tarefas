@extends('system.layouts.app')
@section('content')
    <a href="{{ route('system.task.create') }}" class="site-action btn-raised btn btn-success btn-floating" role="button">
        <i class="icon wb-plus" aria-hidden="true"></i>
    </a>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                @include('system.layouts.form._form_alerts')
                @include('system.task.inc.list')
            </div>
        </div>
    </div>
@endsection
