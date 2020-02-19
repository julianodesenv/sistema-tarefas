@include('system.layouts.form.input._input_select_pluck_4_4_4', [
    'i_0' => [
        'name' => 'client_id',
        'label' => 'Cliente',
        'required' => true,
        'select' => $clients,
        'data-plugin' => 'select2',
        'data-placeholder' => 'Cliente',
        'class' => 'changeSelected',
        'data-classe' => 'selectProjects',
        'data-route' => route('system.ajax.task.project.selectByClient', 0)
    ],
    'i_1' => [
        'name' => 'project_id',
        'label' => 'Projeto',
        'required' => true,
        'select' => $projects,
        'class' => 'selectProjects',
        'data-plugin' => 'select2',
        'data-placeholder' => 'Projeto'
    ],
    'i_2' => [
        'name' => 'sector_id',
        'label' => 'Setor',
        'required' => true,
        'select' => $sectors,
        'data-plugin' => 'select2',
        'data-placeholder' => 'Setor',
        'class' => 'changeSelected',
        'data-classe' => 'selectActions',
        'data-route' => route('system.ajax.task.action.selectByAction', 0)
    ]
])
@include('system.layouts.form.input._input_select_pluck_4_4_4', [
    'i_0' => [
        'name' => 'action_id',
        'label' => 'Ação',
        'required' => true,
        'select' => $actions,
        'class' => 'selectActions',
        'data-plugin' => 'select2',
        'data-placeholder' => 'Ação'
    ],
    'i_1' => [
        'name' => 'priority_id',
        'label' => 'Prioridade',
        'required' => true,
        'select' => $priorities,
        'data-plugin' => 'select2',
        'data-placeholder' => 'Prioridade'
    ],
    'i_2' => [
        'name' => 'responsible_user_id',
        'label' => 'Responsável',
        'required' => true,
        'select' => $responsibleUsers,
        'data-plugin' => 'select2',
        'data-placeholder' => 'Responsável'
    ]
])
@include('system.layouts.form.input._input_text_6_6', [
    'i_0' => [
        'name' => 'start_date',
        'label' => 'Data Entrada',
        'required' => true,
        'mask' => '99/99/9999',
        'datepicker' => true,
        'placeholder' => '__/__/____',
    ],
    'i_1' => [
        'name' => 'end_date',
        'label' => 'Data Prazo',
        'required' => true,
        'mask' => '99/99/9999',
        'datepicker' => true,
        'placeholder' => '__/__/____',
    ],
])
@include('system.layouts.form.input._description_ckeditor')
<hr />
<div class="row">
    @if(!$users->isEmpty())
        @foreach($users as $user)
            <div class="col-md-4">
                <div class="checkbox-custom checkbox-default">
                    <?php
                    $checked = '';
                    if(isset($dados) && isset($dados->users)){
                        foreach ($dados->users as $row){
                            if($row->user_id == $user->id){
                                $checked = 'checked';
                            }
                        }
                    }
                    ?>
                    <input type="checkbox" name="users[]" {{ $checked }} value="{{ $user->id }}" id="{{ $user->id }}">
                    {!! Form::label($user->id, $user->name) !!}
                </div>
            </div>
        @endforeach
    @endif
</div>
<br />
<!--
cliente
setor
acao
prioridade

-->

