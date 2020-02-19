@include('system.task.inc._modal_show')
@include('system.task.inc._modal_pause')
@include('system.task.inc._modal_finish')

@if($tasks->isEmpty())
    @include('system.layouts.form._no_record')
@else
    <table class="table table-hover table-no-more table-striped mb-0 text-truncate wrapper">
        <thead>
        <tr>
            <th>PIT</th>
            <th class="text-center">Ação</th>
            <th class="text-center">Prazo</th>
            <th class="text-center">Prioridade</th>
            <th>Cliente</th>
            <th>Projeto / Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $row)
            <?php
            $classLateTerm = '';
            if($row->task->end_date <= date('Y-m-d')){
                $classLateTerm = 'alert-danger';
            }
            ?>
            <tr>
                <td data-title="PIT">{{ $row->task_id }}</td>
                <td data-title="Ação" id="action-{{ $row->id }}" class="text-center actionTask" data-task-id="{{ $row->task_id }}" data-task-user-id="{{ $row->id }}">
                    @include('system.task.inc._actions')
                </td>
                <td data-title="Prazo" class="text-center {{ $classLateTerm }}">{{ mysql_to_data($row->task->end_date) }}</td>
                <td data-title="Prioridade" class="text-center">
                    <span class="badge mr-5 mb-5 white" style="background: {{ $row->task->priority->color }};">
                        {{ $row->task->priority->name }}
                    </span>
                </td>
                <td data-title="Cliente">{{ $row->task->client->name }}</td>
                <td data-title="Projeto/Setor/Ação">
                    {{ $row->task->project->name.' / '.$row->task->sector->name.' / '.$row->task->action->name }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $tasks->links() !!}
@endif