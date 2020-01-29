<!-- Modal -->
<div class="modal modal-primary modal-fade-in-scale-up" id="taskPause" tabindex="-1" role="dialog" aria-labelledby="exampleOptionalLarge" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        {{ Form::open(['route' => 'system.task.time.pause', 'id' => 'fTaskPause', 'class'=> 'modal-content formTaskPause']) }}
            {!! Form::hidden('task_user_id', null, ['required' => true, 'id' => 'taskUserId']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="tarefa">Pausar Tarefa: #</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 form-group">
                    @include('system.layouts.form.input._description', [
                        'label' => 'Descrição da pausa',
                        'required' => true
                    ])
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">
                    <i class="icon wb-pause"></i>
                    Sim, Pausar!
                </button>
            </div>
        {{ Form::close() }}
    </div>
</div>