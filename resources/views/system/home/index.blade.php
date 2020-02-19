@extends('system.layouts.app')
@section('content')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <h2>Tarefas</h2>
                @include('system.task.inc.list')
            </div>
        </div>
    </div>
@endsection
