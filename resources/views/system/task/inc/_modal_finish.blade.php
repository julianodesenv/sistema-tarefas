<!-- Modal -->
<div class="modal modal-primary modal-fade-in-scale-up" id="taskFinish" tabindex="-1" role="dialog" aria-labelledby="exampleOptionalLarge" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        {{ Form::open(['route' => 'system.task.time.finish', 'id' => 'fTaskFinish', 'class'=> 'modal-content']) }}
            {!! Form::hidden('task_user_id', null, ['required' => true, 'id' => 'taskUserIdFinish']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="tarefa">Pausar Tarefa: #</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 msg">
                </div>
                <div class="col-xl-12 form-group">
                    @include('system.layouts.form.input._description', [
                        'label' => 'Descrição da finalização',
                        'required' => true
                    ])
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">
                    <i class="icon wb-check"></i>
                    Sim, Finalizar!
                </button>
            </div>
        {{ Form::close() }}
    </div>
</div>