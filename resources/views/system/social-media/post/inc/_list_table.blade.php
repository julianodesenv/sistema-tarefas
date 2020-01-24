<table class="table table-hover table-no-more table-striped mb-0 text-truncate dataTable" data-plugin="dataTable">
    <thead>
    <tr>
        <th>Data</th>
        <th>Cliente</th>
        <th>Nome</th>
        <th>Status</th>
        <th class="text-center">Redes</th>
        <th class="text-center">Ação</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dados as $row)
        <tr>
            <td data-title="Data">{{ mysql_to_data($row->date) }}</td>
            <td data-title="Cliente">{{ $row->client->name }}</td>
            <td data-title="Nome">{{ $row->name }}</td>
            <td data-title="Status">
                <span class="badge mr-5 mb-5 white" style="background: {{ $row->status->color }};">
                    {{ $row->status->name }}
                </span>
            </td>
            <td data-title="Redes" class="text-center">
                @if($row->services)
                    {!! socialMediaIcons($row->services) !!}
                @endif
            </td>
            <td data-title="Ação" class="text-center">
                <a href="{{ route('system.social-media.post.service.index', $row->id) }}" title="Serviços" class="btn btn-icon btn-default btn-outline"><i class="icon fa-gear" aria-hidden="true"></i></a>
                <a href="{{ route('system.social-media.post.edit', $row->id) }}" title="Alterar" class="btn btn-icon btn-default btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                <a href="javascript:void(0);" title="Excluir" data-route="{{ route('system.social-media.post.destroy', $row->id) }}" data-toggle="modal" data-target="#Destroy" class="btnDestroy btn btn-icon btn-default btn-outline"><i class="icon wb-trash" aria-hidden="true"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $dados->links() !!}
