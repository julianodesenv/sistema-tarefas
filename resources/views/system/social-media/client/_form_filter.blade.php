{!! Form::open(['route' => ['system.social-media.client.index', $client->id], 'method' => 'get', 'autocomplete' => 'off']) !!}
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('name', isPost(Request::get('name')) ? Request::get('name') : null, ['class'=>'form-control mb-md', 'placeholder' => 'Nome']) !!}
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
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::select('status[]', $statuses, isPost(Request::get('status')) ? Request::get('status') : null, ['multiple' => true, 'data-plugin' => 'select2', 'class'=>'form-control mb-md', 'data-placeholder' => 'Status']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('pit', isPost(Request::get('pit')) ? Request::get('pit') : null, ['class'=>'form-control mb-md', 'placeholder' => 'Código Tarefa']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::select('services[]', $services, isPost(Request::get('services')) ? Request::get('services') : null, ['multiple' => true, 'data-plugin' => 'select2', 'class'=>'form-control mb-md', 'data-placeholder' => 'Rede Social']) !!}
        </div>
    </div>
    <div class="col-md-12 text-right  mb-md-3">
        <a href="{{ route('system.social-media.client.index', $client->id) }}" title="Limpar" class="btn btn-danger mb-md"><i class="fa fa-trash"></i> Limpar</a>
        <button type="submit" class="btn btn-secondary" value="Filtrar Dados"><i class="fa fa-search-plus"></i> Filtrar Dados</button>
    </div>
</div>
{!! Form::close() !!}
<hr />
