<div class="modal-header">
    <h5 class="modal-title" id="tarefa">Usuários da Tarefa PIT: {{ $dados->id }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    {{ Form::model($dados, ['route' => ['system.task.update-users', $dados->id], 'method' => 'PUT', 'files'=> true]) }}
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

    <div class="row">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">
                <i class="icon wb-plus"></i>
                Salvar
            </button>
        </div>
    </div>
    {{ Form::close() }}
</div>
