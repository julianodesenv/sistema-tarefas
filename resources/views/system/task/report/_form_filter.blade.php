{!! Form::open(['route' => 'system.task.report.index', 'method' => 'get']) !!}
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('id', null, ['class'=>'form-control mb-md', 'placeholder' => 'Código']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::select('client_id', $clients, null, ['class'=>'form-control mb-md changeSelected', 'data-route' => route('system.ajax.task.project.selectByClient', 0), 'data-plugin' => 'select2', 'data-classe' => 'selectProjects', 'data-placeholder' => 'Cliente', 'placeholder' => 'Cliente']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::select('project_id', $projects, null, ['class'=>'form-control mb-md selectProjects', 'data-plugin' => 'select2', 'data-classe' => 'selectProjects', 'data-placeholder' => 'Projeto', 'placeholder' => 'Projeto']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::select('sector_id', $sectors, null, ['class'=>'form-control mb-md changeSelected', 'data-route' => route('system.ajax.task.action.selectByAction', 0), 'data-plugin' => 'select2', 'data-classe' => 'selectActions', 'data-placeholder' => 'Setor', 'placeholder' => 'Setor']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::select('action_id', $actions, null, ['class'=>'form-control mb-md selectActions', 'data-plugin' => 'select2', 'data-classe' => 'selectProjects', 'data-placeholder' => 'Ação', 'placeholder' => 'Ação']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::select('user_id', $users, null, ['class'=>'form-control mb-md', 'data-plugin' => 'select2', 'data-placeholder' => 'Usuário', 'placeholder' => 'Usuários']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('from', isPost(Request::get('from')) ? Request::get('from') : null, ['class'=>'form-control mb-md', 'data-input-mask' => '99/99/9999', 'data-plugin-datepicker', 'placeholder' => 'De']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('to', isPost(Request::get('to')) ? Request::get('to') : null, ['class'=>'form-control mb-md', 'data-input-mask' => '99/99/9999', 'data-plugin-datepicker', 'placeholder' => 'Até']) !!}
        </div>
    </div>
    <div class="col-md-12 text-right mb-md-3">
        <a href="{{ route('system.task.report.index') }}" title="Limpar" class="btn btn-danger mb-md"><i class="fa fa-trash"></i> Limpar</a>
        <button type="submit" class="btn btn-secondary" value="Filtrar Dados"><i class="fa fa-search-plus"></i> Filtrar Dados</button>
    </div>
</div>
{!! Form::close() !!}
