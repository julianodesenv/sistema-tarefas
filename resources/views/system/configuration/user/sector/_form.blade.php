{{ Form::open(['route' => 'system.configuration.user.sector.store', 'files'=> true]) }}

@include('system.layouts.form.input._input_select_pluck_12', [
    'name' => 'sector_id',
    'label' => 'Setor',
    'required' => true,
    'select' => $sectors
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
