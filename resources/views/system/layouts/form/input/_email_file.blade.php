<div class="row">
    <div class="col-md-6">
        <?php
        $varClass = '';
        $varRequired = '';
        if (isset($i_0['required']) && $i_0['required']) {
            $varRequired = 'required';
            $i_0['label'] = $i_0['label'].' *';
        }
        if (isset($i_0['class'])) {
            $varClass = $i_0['class'];
        }
        ?>
        @component('system.layouts.form._form_group', ['field' => $i_0['label']])
            {!! Form::label($i_0['name'], $i_0['label']) !!}
            {{ Form::email($i_0['name'], null, ['class' => 'form-control '.$varClass.' '.($errors->has($i_0['name'])?' is-invalid':''), 'maxlength' => 191, $varRequired]) }}
        @endcomponent
    </div>
    <div class="col-md-6">
        <?php
        $varClass = '';
        $varRequired = '';
        if (isset($i_1['required']) && $i_1['required']) {
            $varRequired = 'required';
            $i_1['label'] = $i_1['label'] . ' *';
        }
        if (isset($i_1['class'])) {
            $varClass = $i_1['class'];
        }
        $name = $i_1['name'];
        if (isset($dados->$name) && $dados->$name != '') {
            $lightBoxCSS = 'lightBox';
            $targetBlank = '';
            if (isset($i_1['lightBox'])) {
                $lightBoxCSS = '';
                $targetBlank = 'target="_blank"';
            }
        }
        ?>
        @component('system.layouts.form._form_group', ['field' => $i_1['label']])
            {!! Form::label($i_1['name'], $i_1['label']) !!}
            <div class="custom-file">
                {{ Form::file($i_1['name'], null, ['class' => 'custom-file-input '.$varClass.' '.($errors->has($i_1['name'])?' is-invalid':''), $varRequired]) }}
            </div>
            @if(isset($dados->$name) && $dados->$name != '')
            <a href="{{ asset('uploads/'.$i_1['path'].'/'.$dados->$name) }}" {!! $targetBlank !!} class="btn btn-link{{ $lightBoxCSS }} btn btn-default active">Visualizar</a>
            <a href="{{ $i_1['route_destroy'] }}" class="btn btn-link">Deletar</a>
            @endif
        @endcomponent
    </div>
</div>
