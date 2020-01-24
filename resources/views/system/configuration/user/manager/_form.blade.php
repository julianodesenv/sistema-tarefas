{{ Form::open(['route' => 'system.configuration.user.manager.store', 'files'=> true]) }}

@include('system.layouts.form.input._input_select_pluck_12', [
    'name' => 'manager_id',
    'label' => 'Gerente',
    'required' => true,
    'select' => $users
])

<div class="row">
    <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-primary">
            <i class="icon wb-plus"></i>
            Adicionar
        </button>
    </div>
</div>
{{ Form::hidden('user_id', $user_id) }}
{{ Form::close() }}
