<div class="row">
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'name'])
            {{ Form::label('name', 'Nome *') }}
            {{ Form::text('name', null, ['class' => 'form-control'.($errors->has('name')?' is-invalid':''), 'maxlength' => 191, 'required' => true]) }}
        @endcomponent
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php
            $formRequired = '';
            $varClass = '';
            if(isset($required) && $required){
                $formRequired = 'required';
                $label = $label.' *';
            }
            if (isset($class)) {
                $varClass = $class;
            }
            $varClass .= ($errors->has($name)?' is-invalid':'');
            ?>
            @component('system.layouts.form._form_group', ['field' => $name])
                {{ Form::label($name, $label) }}
                {{ Form::select($name, $select, null, ['class' => 'form-control '.$varClass, $formRequired]) }}
            @endcomponent
        </div>
    </div>
</div>
