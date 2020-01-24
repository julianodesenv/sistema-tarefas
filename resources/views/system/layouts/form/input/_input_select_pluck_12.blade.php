<div class="row">
    <div class="col-md-12">
        @component('system.layouts.form._form_group', ['field' => $name])
            <?php
            $varClass = '';
            $varRequired = '';
            if (isset($required) && $required) {
                $varRequired = 'required';
                $label = $label.' *';
            }
            if (isset($i_0['class'])) {
                $varClass = $i_0['class'];
            }
            $varClass .= ($errors->has($name)?' is-invalid':'');
            ?>
            {!! Form::label($name, $label) !!}
            {{ Form::select($name, $select, null, ['class' => 'form-control '.$varClass, $varRequired]) }}
        @endcomponent
    </div>
</div>
