        <div class="panel-body">
            <div class="row row-lg">
                <div class="col-xl-12">
                    <div class="nav-tabs-horizontal" data-plugin="tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-toggle="tab" href="#tabPause" aria-controls="tabPause" role="tab">
                                    Pausas
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-toggle="tab" href="#tabFinish" aria-controls="tabFinish" role="tab">
                                    Conclusão
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content pt-20">
                            <div class="tab-pane active" id="tabPause" role="tabpanel">
                                @if($playPauses->isEmpty())
                                   <div class="alert alert-info">
                                       Nenhuma ação até o momento!
                                   </div>
                                @else
                                <div class="panel-group panel-group-simple mb-0" id="accordPlayPause" -
                                     aria-multiselectable="true" role="tablist">
                                    @foreach($playPauses as $row)
                                    <div class="panel">
                                        <div class="panel-heading" id="playPauseHeading-{{ $row->id }}" role="tab">
                                            <a class="panel-title" data-toggle="collapse" href="#playPause-{{ $row->id }}" data-parent="#accordPlayPause" aria-expanded="false" aria-controls="exampleCollapseDefaultOne">
                                                {!! mysql_to_data($row->start, true, true).' > '.mysql_to_data($row->end, true, true) !!}
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
                            </div>
                            <div class="tab-pane" id="tabFinish" role="tabpanel">
                                @if(isset($finish->description))
                                    Descrição:<br /><br />
                                    {!! $finish->description !!}
                                @else
                                    <div class="alert alert-info">
                                        Nenhuma conclusão até o momento!
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
