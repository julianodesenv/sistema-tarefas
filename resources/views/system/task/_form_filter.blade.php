{!! Form::open(['route' => 'system.task.index', 'method' => 'get']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::text('name', null, ['class'=>'form-control mb-md', 'placeholder' => 'Nome']) !!}
        </div>
    </div>
    <div class="col-md-12 text-right mb-md-3">
        <a href="{{ route('system.task.index') }}" title="Limpar" class="btn btn-danger mb-md"><i class="fa fa-trash"></i> Limpar</a>
        <button type="submit" class="btn btn-secondary" value="Filtrar Dados"><i class="fa fa-search-plus"></i> Filtrar Dados</button>
    </div>
</div>
{!! Form::close() !!}
