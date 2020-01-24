@include('system.layouts.form.input._input_text_select_pluck_6_6', [
    'i_0' => [
        'name' => 'value',
        'label' => 'Impulsionamento',
        'class' => 'dinheiro'
    ],
    'i_1' => [
        'name' => 'service_id',
        'label' => 'Serviço',
        'required' => true,
        'select' => $services
    ]
])
{{ Form::hidden('post_id', $post_id) }}
