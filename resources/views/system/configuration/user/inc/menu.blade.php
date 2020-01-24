<div class="row">
    <div class="col-md-12 mb-3 text-right">
        <a href="{{ route('system.configuration.user.sector.index', $route_id) }}" class="mb-xs mt-xs mr-xs btn btn-outline-dark">
            Setores
        </a>
        <a href="{{ route('system.configuration.user.password.edit', $route_id) }}" class="mb-xs mt-xs mr-xs btn btn-outline-dark">
            Alterar Senha
        </a>
        <a href="@if(isset($route_back)){{ $route_back }}@else javascript:void(0); @endif" class="mb-xs mt-xs mr-xs btn btn-secondary">
            Voltar
        </a>
    </div>
</div>
