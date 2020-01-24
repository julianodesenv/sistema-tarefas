<div class="row">
    <div class="col-md-12">
        @component('system.layouts.form._form_group', ['field' => 'name'])
            <?php $label = isset($label) ? $label : 'Nome'; ?>
            {{ Form::label('name', $label.' *') }}
            {{ Form::text('name', null, ['class' => 'form-control '.($errors->has('name')?' is-invalid':''), 'maxlength' => 191, 'required' => true]) }}
        @endcomponent
    </div>
</div>
