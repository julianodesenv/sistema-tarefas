{{ Form::open(['route' => 'system.schedule.user.store', 'files'=> true]) }}

@include('system.layouts.form.input._input_select_pluck_12', [
        'name' => 'user_id',
        'label' => 'Usuário',
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
{{ Form::hidden('schedule_id', $schedule_id) }}
{{ Form::close() }}
