@include('system.layouts.form.input._name_active')
@include('system.layouts.form.input._input_text_select_pluck_6_6', [
    'i_0' => [
        'name' => 'day',
        'label' => 'Quantidade de Dias'
    ],
    'i_1' => [
        'label' => 'Demanda Única (JOB)',
        'name' => 'unique',
        'required' => true,
        'select' => ['y' => 'Sim', 'n' => 'Não']
    ]
])
