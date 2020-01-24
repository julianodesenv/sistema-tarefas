@include('system.layouts.form.input._name_select_pluck', [
    'name' => 'role_id',
    'select' => $roles,
    'label' => 'Nível',
    'required' => true
])
@include('system.layouts.form.input._input_text_6_6', [
    'i_0' => [
        'label' => 'Data de Nascimento',
        'name' => 'birth_date',
        'required' => true,
        'mask' => '99/99/9999',
        'datepicker' => true,
        'placeholder' => '__/__/____',
    ],
    'i_1' => [
        'label' => 'Telefone/Celular',
        'name' => 'phone',
        'mask' => '(99) 999.999.999',
        'placeholder' => '(__) ___.___.___'
    ],
])
@include('system.layouts.form.input._email_file', [
    'i_0' => [
        'label' => 'E-mail',
        'required' => true,
        'name' => 'email'
    ],
    'i_1' => [
        'label' => 'Imagem',
        'required' => false,
        'name' => 'image',
        'path' => 'users',
        'lightBox' => true,
        'route_destroy' => route('system.configuration.user.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
    ]
])
@if(!isset($dados))
<div class="row">
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'password'])
            {{ Form::label('password', 'Senha *') }}
            <input type="password" class="form-control {{ $errors->has('password')?' is-invalid':'' }}" id="password" maxlength="255" name="password" required />
        @endcomponent
    </div>
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'password_confirmation'])
            {{ Form::label('password_confirmation', 'Confirmar Senha *') }}
            <input type="password" class="form-control {{ $errors->has('password_confirmation')?' is-invalid':'' }}" id="password_confirmation" maxlength="255" name="password_confirmation" required />
        @endcomponent
    </div>
</div>
@endif
