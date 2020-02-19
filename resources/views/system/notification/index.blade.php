@extends('system.layouts.app')
@section('content')
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
                @include('system.layouts.form._form_alerts')
                @if($dados->isEmpty())
                    @include('system.layouts.form._no_record')
                @else
                    <table class="table table-hover table-no-more table-striped mb-0 text-truncate">
                        <thead>
                        <tr>
                            <th>Mensagem</th>
                            <th class="text-center">Visualizado</th>
                            <th class="text-center">Data</th>
                            <th class="text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <?php $data = json_decode($row->data); ?>
                            <tr>
                                <td data-title="Mensagem">{{ $data->message }}</td>
                                <td data-title="Visualizado" class="text-center">
                                    @if(is_null($row->read_at))
                                        <i class="fa wb-close text-danger" title="Não Visualizado"></i>
                                    @else
                                        <i class="fa wb-check-circle text-success" title="Visualizado"></i>
                                    @endif
                                </td>
                                <td data-title="Data" class="text-center">{{ mysql_to_data($row->created_at, true, false) }}</td>
                                <td data-title="Ação" class="text-center">
                                    <a href="{{ route('system.notification.view', $row->id) }}" title="Visualizar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-zoom-in" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $dados->links() !!}
                @endif
            </div>
        </div>
    </div>
@endsection
