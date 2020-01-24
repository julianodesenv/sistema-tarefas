@include('system.layouts.form.input._name_active')
@include('system.layouts.form.input._input_select_pluck_6_6', [
    'i_0' => [
        'name' => 'task_action_id',
        'label' => 'Ação',
        'required' => false,
        'select' => $actions,
        'data-plugin' => 'select2',
        'data-placeholder' => 'Ação'
    ],
    'i_1' => [
        'name' => 'sector_id',
        'label' => 'Setor',
        'required' => true,
        'select' => $sectors,
        'data-plugin' => 'select2',
        'data-placeholder' => 'Setor'
    ]
])
