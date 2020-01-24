@include('system.layouts.form.input._input_text_6_6', [
    'i_0' => [
        'label' => 'Nome',
        'name' => 'name',
        'required' => true
    ],
    'i_1' => [
        'label' => 'Cargo',
        'name' => 'office'
    ],
])
@include('system.layouts.form.input._input_text_6_6', [
    'i_0' => [
        'label' => 'E-mail',
        'name' => 'email'
    ],
    'i_1' => [
        'label' => 'Telefone',
        'name' => 'phone',
        'mask' => '(99) 999.999.999',
        'placeholder' => '(__) ___.___.___'
    ],
])
@include('system.layouts.form.input._description_ckeditor')
{!! Form::hidden('client_id', $client_id, ['required' => true]) !!}
