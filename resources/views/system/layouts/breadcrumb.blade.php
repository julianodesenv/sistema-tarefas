<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('system.home') }}">Dashboard</a></li>
        @if(isset($config['activeMenu']))
        <li class="breadcrumb-item">
            <a href="@if(isset($config['routeMenu'])){{ $config['routeMenu'] }}@else # @endif">
                {{ $config['titleMenu'] }}
            </a>
        </li>
        @endif
        @if(isset($config['activeMenuN2']))
            <li class="breadcrumb-item">
                <a href="@if(isset($config['routeMenuN2'])){{ $config['routeMenuN2'] }}@else # @endif">
                    {{ $config['titleMenuN2'] }}
                </a>
            </li>
        @endif
        @if(isset($config['activeMenuN3']))
            <li class="breadcrumb-item">
                <a href="@if(isset($config['routeMenuN3'])){{ $config['routeMenuN3'] }}@else # @endif">
                    {{ $config['titleMenuN3'] }}
                </a>
            </li>
        @endif
        @if(isset($config['action']))
        <li class="breadcrumb-item active" aria-current="page">{{ $config['action'] }}</li>
        @endif
    </ol>
</nav>
