<a href="javascript:void(0);" title="Visualizar" data-toggle="modal" data-target="#taskShow" class="btn btn-icon btn-default btn-outline btnTaskShow"><i class="icon wb-zoom-in" aria-hidden="true"></i></a>
@if($row->status == 'pause')
    <a href="javascript:void(0);" title="Iniciar" class="btn btn-icon btn-default btn-outline btnTaskPlay"><i class="icon wb-play" aria-hidden="true"></i></a>
@endif
@if($row->status == 'play')
    <a href="javascript:void(0);" title="Pausar" data-toggle="modal" data-target="#taskPause" class="btn btn-icon btn-default btn-outline btnTaskPause"><i class="icon wb-pause" aria-hidden="true"></i></a>
    <a href="javascript:void(0);" title="Finalizar" data-toggle="modal" data-target="#taskFinish"  class="btn btn-icon btn-default btn-outline btnTaskFinish"><i class="icon wb-check" aria-hidden="true"></i></a>
@endif