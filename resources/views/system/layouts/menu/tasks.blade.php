<li class="dropdown site-menu-item has-section has-sub">
    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
        <i class="site-menu-icon fa-tasks" aria-hidden="true"></i>
        <span class="site-menu-title">Tarefas</span>
        <span class="site-menu-arrow"></span>
    </a>
    <ul class="dropdown-menu site-menu-sub site-menu-section-wrap blocks-md-3">
        <li class="site-menu-section site-menu-item has-sub">
            <div class="site-menu-scroll-wrap is-section">
                <div>
                    <div>
                        <ul class="site-menu-sub site-menu-section-list">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('system.task.create') }}">
                                    <span class="site-menu-title">Cadastrar</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('system.task.index') }}">
                                    <span class="site-menu-title">Minhas Tarefas</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('system.task.report.index') }}">
                                    <span class="site-menu-title">Relatórios</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</li>