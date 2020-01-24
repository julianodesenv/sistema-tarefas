@include('system.layouts.form.input._name_select_pluck', [
    'name' => 'type_id',
    'label' => 'Tipo Serviço',
    'required' => true,
    'select' => $types
])
@include('system.layouts.form.input._active')
