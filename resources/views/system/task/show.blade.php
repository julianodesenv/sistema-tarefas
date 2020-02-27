@extends('system.layouts.app')
@section('content')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('system.task.index') }}" class="mb-xs mt-xs mr-xs btn btn-secondary">
                            <i class="fa fa-undo"></i> Voltar
                        </a>
                    </div>
                </div>
                <div class="nav-tabs-horizontal mt-4" data-plugin="tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-toggle="tab" href="#tabTask" aria-controls="tabTask" role="tab">
                                Tarefa
                            </a>
                        </li>
                        @if($dados->users)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-toggle="tab" href="#tabPause" aria-controls="tabPause" role="tab">
                                Pausas
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-toggle="tab" href="#tabFinish" aria-controls="tabFinish" role="tab">
                                Conclusão
                            </a>
                        </li>
                        @endif
                    </ul>
                    <div class="tab-content pt-20">
                        <div class="tab-pane active" id="tabTask" role="tabpanel">
                            @include('system.task.show.content')
                        </div>
                        @if($dados->users)
                        <div class="tab-pane" id="tabPause" role="tabpanel">
                        @foreach($dados->users as $user)
                            <?php
                            $playPauses = null;
                            if (!$user->times->isEmpty()) {
                                $playPauses = $user->times->where('status', '!=', 'finish');
                            }
                            ?>
                            @if($playPauses)
                                <div class="panel-group panel-group-simple mb-0" id="accordPlayPause" aria-multiselectable="true" role="tablist">
                                    @foreach($playPauses as $row)
                                        <div class="panel">
                                            <div class="panel-heading" id="playPauseHeading-{{ $row->id }}" role="tab">
                                                <a class="panel-title" data-toggle="collapse" href="#playPause-{{ $row->id }}" data-parent="#accordPlayPause" aria-expanded="false" aria-controls="exampleCollapseDefaultOne">
                                                    {!! $user->user->name.' / '.mysql_to_data($row->start, true, true).' > '.mysql_to_data($row->end, true, true) !!}
                                                </a>
                                            </div>
                                            <div class="panel-collapse collapse" id="playPause-{{ $row->id }}" aria-labelledby="playPauseHeading-{{ $row->id }}" role="tabpanel">
                                                <div class="panel-body">
                                                    {!! $row->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                        </div>
                        <div class="tab-pane" id="tabFinish" role="tabpanel">
                            @foreach($dados->users as $user)
                                <?php
                                $finish = null;
                                if (!$user->times->isEmpty()) {
                                    $finish = $user->times->where('status', 'finish');
                                }
                                ?>
                                @if($finish)
                                    <div class="panel-group panel-group-simple mb-0" id="accordPlayPause" aria-multiselectable="true" role="tablist">
                                        @foreach($finish as $row)
                                            <div class="panel">
                                                <div class="panel-heading" id="playPauseHeading-{{ $row->id }}" role="tab">
                                                    <a class="panel-title" data-toggle="collapse" href="#playPause-{{ $row->id }}" data-parent="#accordPlayPause" aria-expanded="false" aria-controls="exampleCollapseDefaultOne">
                                                        {!! $user->user->name.' / '.mysql_to_data($row->end, true, true) !!}
                                                    </a>
                                                </div>
                                                <div class="panel-collapse collapse" id="playPause-{{ $row->id }}" aria-labelledby="playPauseHeading-{{ $row->id }}" role="tabpanel">
                                                    <div class="panel-body">
                                                        <strong>Descrição:</strong><br /><br />
                                                        {!! $row->description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
@endsection