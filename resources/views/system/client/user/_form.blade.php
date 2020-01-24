{{ Form::open(['route' => 'system.client.user.store', 'files'=> true]) }}

<div class="row mt-30">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::select('users[]', $users, null, ['multiple' => true, 'data-plugin' => 'select2', 'class'=>'form-control mb-md', 'data-placeholder' => 'Usuários', 'required' => true]) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-primary">
            <i class="icon wb-plus"></i>
            Adicionar
        </button>
    </div>
</div>
{{ Form::hidden('client_id', $client_id) }}
{{ Form::close() }}
