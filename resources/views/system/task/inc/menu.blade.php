<div class="row">
    <div class="col-md-12 mb-3 text-right">
        <!--
        <a href="{{ route('system.task.user.index', $route_id) }}" class="mb-xs mt-xs mr-xs btn btn-outline-dark">
            Usuários
        </a>
        -->
        <a href="@if(isset($route_back)){{ $route_back }}@else javascript:void(0); @endif" class="mb-xs mt-xs mr-xs btn btn-secondary">
            Voltar
        </a>
    </div>
</div>
