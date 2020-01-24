@include('system.layouts.form.input._name_order')
@include('system.layouts.form.input._description_ckeditor', [
    'required' => true
])
{!! Form::hidden('client_domain_id', $domain_id, ['required' => true]) !!}
