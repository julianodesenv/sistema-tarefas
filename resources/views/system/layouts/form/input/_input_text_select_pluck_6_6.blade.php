<div class="row">
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => $i_0['name']])
            <?php
            $varClass = '';
            $varRequired = '';
            $varMask = '';
            $dataPlugin = '';
            $placeholder = isset($i_0['placeholder']) ? $i_0['placeholder'] : '';
            $datepicker = isset($i_0['datepicker']) ? 'data-plugin-datepicker' : '';
            if (isset($i_0['required']) && $i_0['required']) {
                $varRequired = 'required';
                $i_0['label'] = $i_0['label'].' *';
            }
            if (isset($i_0['class'])) {
                $varClass = $i_0['class'];
            }
            if (isset($i_0['mask'])) {
                $varMask = $i_0['mask'];
                $dataPlugin = 'data-plugin-masked-input';
            }
            $varClass .= ($errors->has($i_0['name'])?' is-invalid':'');
            ?>
            {!! Form::label($i_0['name'], $i_0['label']) !!}
            {{ Form::text($i_0['name'], null, ['class' => 'form-control '.$varClass, 'data-input-mask' => $varMask, $dataPlugin, $datepicker, 'placeholder' => $placeholder, $varRequired, 'maxlength' => 191]) }}
        @endcomponent
    </div>
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => $i_1['name']])
            <?php
            $varClass = '';
            $varRequired = '';
            if (isset($i_1['required']) && $i_1['required']) {
                $varRequired = 'required';
                $i_1['label'] = $i_1['label'].' *';
            }
            if (isset($i_1['class'])) {
                $varClass = $i_1['class'];
            }
            $varClass .= ($errors->has($i_1['name'])?' is-invalid':'');
            ?>
            {!! Form::label($i_1['name'], $i_1['label']) !!}
            {{ Form::select($i_1['name'], $i_1['select'], null, ['class' => 'form-control '.$varClass, $varRequired]) }}
        @endcomponent
    </div>
</div>
