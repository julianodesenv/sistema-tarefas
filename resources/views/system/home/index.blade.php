@extends('system.layouts.app')
@section('content')
    <div class="page-content">

        <div class="panel">
            <div class="panel-body">
                <h2>Tarefas</h2>
                @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
                    <div class="col-md-12">
                        <div class="example example-buttons">
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group btn-group-lg" role="group">
                                    <a href="{{ route('system.task.manager.index') }}" title="Controle de Tarefas" class="btn btn-success">
                                        <span class="text-uppercase hidden-sm-down">Controle</span>
                                    </a>
                                </div>
                                <div class="btn-group btn-group-lg" role="group">
                                    <a href="{{ route('system.task.report.index')  }}" title="" class="btn btn-warning">
                                        <span class="text-uppercase hidden-sm-down">Relatório</span>
                                    </a>
                                </div>
                                <div class="btn-group btn-group-lg" role="group">
                                    <a href="{{ route('system.task.index') }}" title="" class="btn btn-info">
                                        <span class="text-uppercase hidden-sm-down">Minhas Tarefas</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @include('system.task.inc.list')
            </div>
        </div>
    </div>
@endsection
