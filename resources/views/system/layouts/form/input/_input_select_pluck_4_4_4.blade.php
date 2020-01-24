<div class="row">
    <div class="col-md-4">
        @component('system.layouts.form._form_group', ['field' => $i_0['name']])
            <?php
            $varClass = '';
            $varRequired = '';
            $varDataPlugin = '';
            $varPlaceholder = '';
            if (isset($i_0['required']) && $i_0['required']) {
                $varRequired = 'required';
                $i_0['label'] = $i_0['label'] . ' *';
            }
            if (isset($i_0['data-plugin'])) {
                $varDataPlugin = $i_0['data-plugin'];
            }
            if (isset($i_0['data-placeholder'])) {
                $varPlaceholder = $i_0['data-placeholder'];
            }
            if (isset($i_0['class'])) {
                $varClass = $i_0['class'];
            }
            $varClass .= ($errors->has($i_0['name']) ? ' is-invalid' : '');
            ?>
            {!! Form::label($i_0['name'], $i_0['label']) !!}
            {{ Form::select($i_0['name'], $i_0['select'], null, [
                    'class' => 'form-control '.$varClass,
                    $varRequired,
                    'data-plugin' => $varDataPlugin,
                    'data-placeholder' => $varPlaceholder
                ])
             }}
        @endcomponent
    </div>
    <div class="col-md-4">
        @component('system.layouts.form._form_group', ['field' => $i_1['name']])
            <?php
            $varClass = '';
            $varRequired = '';
            $varDataPlugin = '';
            $varPlaceholder = '';
            if (isset($i_1['required']) && $i_1['required']) {
                $varRequired = 'required';
                $i_1['label'] = $i_1['label'] . ' *';
            }
            if (isset($i_1['data-plugin'])) {
                $varDataPlugin = $i_1['data-plugin'];
            }
            if (isset($i_1['data-placeholder'])) {
                $varPlaceholder = $i_1['data-placeholder'];
            }
            if (isset($i_1['class'])) {
                $varClass = $i_1['class'];
            }
            $varClass .= ($errors->has($i_1['name']) ? ' is-invalid' : '');
            ?>
            {!! Form::label($i_1['name'], $i_1['label']) !!}
            {{ Form::select($i_1['name'], $i_1['select'], null, [
                    'class' => 'form-control '.$varClass,
                    $varRequired,
                    'data-plugin' => $varDataPlugin,
                    'data-placeholder' => $varPlaceholder
                ])
            }}
        @endcomponent
    </div>
    <div class="col-md-4">
        @component('system.layouts.form._form_group', ['field' => $i_2['name']])
            <?php
            $varClass = '';
            $varRequired = '';
            $varDataPlugin = '';
            $varPlaceholder = '';
            if (isset($i_2['required']) && $i_2['required']) {
                $varRequired = 'required';
                $i_2['label'] = $i_2['label'] . ' *';
            }
            if (isset($i_2['data-plugin'])) {
                $varDataPlugin = $i_2['data-plugin'];
            }
            if (isset($i_2['data-placeholder'])) {
                $varPlaceholder = $i_2['data-placeholder'];
            }
            if (isset($i_2['class'])) {
                $varClass = $i_2['class'];
            }
            $varClass .= ($errors->has($i_2['name']) ? ' is-invalid' : '');
            ?>
            {!! Form::label($i_2['name'], $i_2['label']) !!}
            {{ Form::select($i_2['name'], $i_2['select'], null, [
                    'class' => 'form-control '.$varClass,
                    $varRequired,
                    'data-plugin' => $varDataPlugin,
                    'data-placeholder' => $varPlaceholder
                ])
            }}
        @endcomponent
    </div>
</div>
