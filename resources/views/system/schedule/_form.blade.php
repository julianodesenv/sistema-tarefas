@include('system.layouts.form.input._input_text_6_6', [
    'i_0' => [
        'label' => 'Título',
        'name' => 'name'
    ],
    'i_1' => [
        'name' => 'date',
        'label' => 'Data',
        'required' => true,
        'mask' => '99/99/9999 99:99',
        //'datepicker' => true,
        'placeholder' => '__/__/____ __:__',
    ],
])
@include('system.layouts.form.input._description_ckeditor')
