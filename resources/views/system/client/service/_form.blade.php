{{ Form::open(['route' => 'system.client.service.store', 'files'=> true]) }}

@include('system.layouts.form.input._input_select_pluck_text_4_4_4', [
    'i_0' => [
        'name' => 'service_id',
        'label' => 'Serviço',
        'required' => true,
        'select' => $services
    ],
    'i_1' => [
        'name' => 'demand_id',
        'label' => 'Demanda',
        'required' => true,
        'select' => $demands
    ],
    'i_2' => [
        'name' => 'quantity',
        'label' => 'Quantidade?',
        'required' => 'true'
    ]
])

<div class="row">
    <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-primary">
            <i class="icon wb-plus"></i>
            Adicionar
        </button>
    </div>
</div>
{{ Form::hidden('client_id', $client_id) }}
{{ Form::close() }}
