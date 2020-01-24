@include('system.layouts.form.input._input_text_select_pluck_6_6', [
    'i_0' =>[
        'label' => 'Nome / Razão Social',
        'name' => 'name',
        'required' => true
    ],
        'i_1'=> [
        'label' => 'Tipo',
        'name' => 'type',
        'required' => true,
        'class' => 'typeClient',
        'select' => ['' => 'Selecione', 'pf' => 'Pessoa Física', 'pj' => 'Pessoa Jurídica']
    ]
])

<div class="typePF @if(!isset($dados) || $dados->type != 'pf') none @endif">
    @include('system.layouts.form.input._input_text_12', [
        'label' => 'CPF',
        'name' => 'cpf',
        'mask' => '999.999.999-99',
        'placeholder' => '___.___.___-__'
    ])
</div>

<div class="typePJ @if(!isset($dados) || $dados->type != 'pj') none @endif">
    @include('system.layouts.form.input._input_text_6_6', [
        'i_0' => [
            'label' => 'CNPJ',
            'name' => 'cnpj',
            'mask' => '99.999.999/9999-99',
            'placeholder' => '__.___.___/____-__'
        ],
        'i_1' => [
            'label' => 'Nome Fantasia',
            'name' => 'fantasy_name'
        ],
    ])
    @include('system.layouts.form.input._input_text_6_6', [
        'i_0' => [
            'label' => 'Incrição Estadual',
            'name' => 'state_registration'
        ],
        'i_1' => [
            'label' => 'Inscrição Municipal',
            'name' => 'municipal_registration'
        ],
    ])
</div>

@include('system.layouts.form.input._input_select_pluck_text_4_4_4', [
    'i_0' => [
        'label' => 'Tipo Cliente',
        'name' => 'type_client_id',
        'required' => true,
        'select' => $types
    ],
    'i_1' => [
        'label' => 'Segmento Cliente',
        'name' => 'segment_client_id',
        'required' => true,
        'select' => $segments
    ],
    'i_2' => [
        'label' => 'CEP',
        'name' => 'zip_code',
        'mask' => '99999-999',
        'placeholder' => '_____-___',
    ]
])
@include('system.layouts.form.input._state_city')
@include('system.layouts.form.input._input_text_4_4_4', [
    'i_0' => [
        'label' => 'Endereço',
        'name' => 'address'
    ],
    'i_1' => [
        'label' => 'Bairro',
        'name' => 'district',
    ],
    'i_2' => [
        'label' => 'Número',
        'name' => 'number'
    ]
])
@include('system.layouts.form.input._input_text_4_4_4', [
    'i_0' => [
        'label' => 'Complemento',
        'name' => 'complement'
    ],
    'i_1' => [
        'label' => 'Telefone',
        'name' => 'phone',
        'mask' => '(99) 9999.9999',
        'placeholder' => '(__) ____.____'
    ],
    'i_2' => [
        'label' => 'Celular',
        'name' => 'cell_phone',
        'mask' => '(99) 999.999.999',
        'placeholder' => '(__) ___.___.___'
    ]
])
@include('system.layouts.form.input._email_file', [
    'i_0' => [
        'label' => 'E-mail',
        'required' => true,
        'name' => 'email'
    ],
    'i_1' => [
        'label' => 'Logo',
        'required' => false,
        'name' => 'image',
        'path' => 'clients',
        'lightBox' => true,
        'route_destroy' => route('system.client.destroyFile', ['id' => isset($dados->id) ? $dados->id : null, 'name' => 'image'])
    ]
])
@include('system.layouts.form.input._input_text_select_pluck_6_6', [
    'i_0' => [
        'name' => 'entry_date',
        'label' => 'Data Entrada',
        'required' => true,
        'mask' => '99/99/9999',
        'datepicker' => true,
        'placeholder' => '__/__/____',
    ],
    'i_1' => [
        'label' => 'Ativo',
        'name' => 'active',
        'required' => true,
        'select' => ['y' => 'Sim', 'n' => 'Não']
    ]
])
@include('system.layouts.form.input._description_ckeditor')
