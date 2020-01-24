@include('system.layouts.form.input._name', ['label' => 'Título do Post'])
@include('system.layouts.form.input._input_select_pluck_6_6', [
    'i_0' => [
        'name' => 'client_id',
        'label' => 'Cliente',
        'required' => true,
        'select' => $clients,
        'data-plugin' => 'select2',
        'data-placeholder' => 'Cliente'
    ],
    'i_1' => [
        'name' => 'status_id',
        'label' => 'Status',
        'required' => true,
        'select' => $status,
        'data-plugin' => 'select2',
        'data-placeholder' => 'Status'
    ]
])
@include('system.layouts.form.input._input_text_6_6', [
    'i_0' => [
        'name' => 'date',
        'label' => 'Data Publicação',
        'required' => true,
        'mask' => '99/99/9999',
        'datepicker' => true,
        'placeholder' => '__/__/____',
    ],
    'i_1' => [
        'label' => 'Link da referência',
        'name' => 'link_url'
    ]
])
@include('system.layouts.form.input._input_text_6_6', [
    'i_0' => [
        'label' => 'Código Tarefa',
        'name' => 'pit'
    ],
    'i_1' => [
        'name' => 'deadline',
        'label' => 'Data Tarefa',
        'mask' => '99/99/9999',
        'datepicker' => true,
        'placeholder' => '__/__/____'
    ]
])
@include('system.layouts.form.input._description_ckeditor')
