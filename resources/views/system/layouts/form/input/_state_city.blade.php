<div class="row">
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'state_id'])
            {!! Form::label('state_id', 'Estado *') !!}
            {!! Form::select('state_id', $states, null, [
                    'data-classe' => 'city_id',
                    'class'=>'form-control mb-md uf',
                     'data-plugin' => 'select2',
                    'data-placeholder' => 'Estado'
                ]) !!}
        @endcomponent
    </div>
    <div class="col-md-6">
        @component('system.layouts.form._form_group', ['field' => 'city_id'])
            {!! Form::label('city_id', 'Cidade *') !!}
            {!! Form::select('city_id', isPost($cities) ? $cities : ['' => 'Selecione'], null, [
                        'class'=>'form-control mb-md city_id',
                        'data-plugin' => 'select2',
                        'data-placeholder' => 'Cidade'
                    ]) !!}
        @endcomponent
    </div>
</div>
