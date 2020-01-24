@include('system.layouts.form.input._name_active')
@include('system.layouts.form.input._input_select_pluck_12', [
        'name' => 'task_project_template_id',
        'label' => 'Modelo de Projeto',
        'required' => false,
        'select' => $projects,
        'data-plugin' => 'select2',
        'data-placeholder' => 'Modelo de Projeto'
])
