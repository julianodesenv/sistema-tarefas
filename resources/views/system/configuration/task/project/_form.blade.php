@include('system.layouts.form.input._name_active')
@include('system.layouts.form.input._input_select_pluck_6_6', [
        'i_0' => [
            'name' => 'task_project_template_id',
            'label' => 'Modelo do Projeto',
            'required' => true,
            'select' => $templates,
            'data-plugin' => 'select2',
            'data-placeholder' => 'Modelo do Projeto'
        ],
        'i_1' => [
            'name' => 'client_id',
            'label' => 'Cliente',
            'required' => true,
            'select' => $clients,
            'data-plugin' => 'select2',
            'data-placeholder' => 'Cliente'
        ],
])
@include('system.layouts.form.input._input_text_4_4_4', [
    'i_0' => [
        'name' => 'start_date',
        'label' => 'Data Início',
        'required' => true,
        'mask' => '99/99/9999',
        'datepicker' => true,
        'placeholder' => '__/__/____',
    ],
    'i_1' => [
        'name' => 'end_date_forecast',
        'label' => 'Data Previsão Conclusão',
        'required' => true,
        'mask' => '99/99/9999',
        'datepicker' => true,
        'placeholder' => '__/__/____',
    ],
    'i_2' => [
        'name' => 'end_date',
        'label' => 'Data Conclusão',
        'required' => false,
        'mask' => '99/99/9999',
        'datepicker' => true,
        'placeholder' => '__/__/____',
    ],
])
@include('system.layouts.form.input._description_ckeditor')
