<div class="row">
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'name'])
            {{ Form::label('name', 'Nome *') }}
            {{ Form::text('name', null, ['class' => 'form-control'.($errors->has('name')?' is-invalid':''), 'maxlength' => 191, 'required' => true]) }}
        @endcomponent
    </div>
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'order'])
            {{ Form::label('order', 'Ordem') }}
            {{ Form::text('order', null, ['class' => 'form-control'.($errors->has('order')?' is-invalid':''), 'maxlength' => 10]) }}
        @endcomponent
    </div>
</div>
