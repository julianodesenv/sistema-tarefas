<div class="modal-header">
    <h5 class="modal-title" id="tarefa">Tarefa PIT: {{ $dados->id }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    @include('system.task.show.content')
</div>