<div class="row">
    <div class="col-md-12">
        @component('system.layouts.form._form_group', ['field' => $name])
            <?php
            $varClass = '';
            $varRequired = '';
            $varMask = '';
            $dataPlugin = '';
            $placeholder = isset($placeholder) ? $placeholder : '';
            $datepicker = isset($datepicker) ? 'data-plugin-datepicker' : '';
            if (isset($required) && $required) {
                $varRequired = 'required';
                $label = $label.' *';
            }
            if (isset($class)) {
                $varClass = $class;
            }
            if (isset($mask)) {
                $varMask = $mask;
                $dataPlugin = 'data-plugin-masked-input';
            }
            $varClass .= ($errors->has($name)?' is-invalid':'');
            ?>
            {!! Form::label($name, $label) !!}
            {{ Form::text($name, null, ['class' => 'form-control '.$varClass, 'data-input-mask' => $varMask, $dataPlugin, $datepicker, 'placeholder' => $placeholder, $varRequired, 'maxlength' => 191]) }}
        @endcomponent
    </div>
</div>
