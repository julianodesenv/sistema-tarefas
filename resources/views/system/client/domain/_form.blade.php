@include('system.layouts.form.input._name_url')
@include('system.layouts.form.input._description_ckeditor', [
    'required' => true
])
{!! Form::hidden('client_id', $client_id, ['required' => true]) !!}
