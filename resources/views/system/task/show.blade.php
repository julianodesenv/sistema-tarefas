<div class="modal-header">
    <h5 class="modal-title" id="tarefa">Tarefa: #{{ $dados->id }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="col-md-12 text-right">
        <span class="badge mr-5 mb-5 font-size-14 white" style="background: {{ $dados->priority->color }};">
            {{ $dados->priority->name }}
        </span>
    </div>
    <table class="table table-striped table-bordered mb-2 text-truncate font-size-12">
        <tr>
            <td data-title="Projeto">Projeto:</td>
            <td>{{ $dados->project->name }}</td>
        </tr>
        <tr>
            <td data-title="Projeto">Ação:</td>
            <td>{{ $dados->action->name }}</td>
        </tr>
        <tr class="table-success">
            <td data-title="Entrada">Entrada:</td>
            <td>{{ mysql_to_data($dados->start_date) }}</td>
        </tr>
        <tr class="table-danger">
            <td data-title="Entrada">Prazo:</td>
            <td>{{ mysql_to_data($dados->end_date) }}</td>
        </tr>
        <tr>
            <td data-title="Entrada">Responsável:</td>
            <td>{{ $dados->user->name }}</td>
        </tr>
        <tr>
            <td data-title="Entrada">Empresa:</td>
            <td>{{ $dados->client->name }}</td>
        </tr>
    </table>
    <h4 class="text-bold">Descrição:</h4>
    {!! $dados->description !!}
    @if(!is_null($taskUser))
    <hr />
    <h5>Duração: {{ $taskUser->total }}</h5>
    @endif
</div>