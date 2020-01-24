<div class="row">
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'password'])
            {{ Form::label('password', 'Nova Senha *') }}
            <input type="password" class="form-control {{ $errors->has('password')?' is-invalid':'' }}" id="password" maxlength="255" name="password" required />
        @endcomponent
    </div>
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'password_confirmation'])
            {{ Form::label('password_confirmation', 'Confirmar Nova Senha *') }}
            <input type="password" class="form-control {{ $errors->has('password_confirmation')?' is-invalid':'' }}" id="password_confirmation" maxlength="255" name="password_confirmation" required />
        @endcomponent
    </div>
</div>
