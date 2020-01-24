<div class="row">
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'name'])
            {{ Form::label('name', 'Nome *') }}
            {{ Form::text('name', null, ['class' => 'form-control'.($errors->has('name')?' is-invalid':''), 'maxlength' => 191, 'required' => true]) }}
        @endcomponent
    </div>
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'active'])
            {{ Form::label('active', 'Ativo *') }}
            {{ Form::select('active', ['y' => 'Sim', 'n' => 'Não'], null, ['class' => 'form-control'.($errors->has('active')?' is-invalid':''), 'required' => true]) }}
        @endcomponent
    </div>
</div>
