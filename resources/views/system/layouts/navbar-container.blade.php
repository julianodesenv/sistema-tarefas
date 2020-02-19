<div class="navbar-container container-fluid">
    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        @if(Auth::user()->role->id == 1)
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                    <a class="nav-link" data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="nav-item hidden-float">
                    <a class="nav-link icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                       role="button">
                        <span class="sr-only">Toggle Search</span>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-fw dropdown-mega">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="fade" role="button">
                        Configurações
                        <i class="icon wb-chevron-down-mini" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <div class="mega-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Configurações</h5>
                                    <ul class="blocks-2">
                                        <li class="mega-menu m-0">
                                            <ul class="list-icons">
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.type-client.index') }}">Tipo de Cliente</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.type-service.index') }}">Tipo de Serviço</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.segment-client.index') }}">Segmentos de Cliente</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.user-role.index') }}">Níveis</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.user.index') }}">Usuários</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <h5>Cadastros</h5>
                                    <ul class="blocks-2">
                                        <li class="mega-menu m-0">
                                            <ul class="list-icons">
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.client.index') }}">Clientes</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.service.index') }}">Serviços</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.demand.index') }}">Demandas</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.sector.index') }}">Setores</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.social-media.status.index') }}">Social Mídia Status</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <h5>Tarefas</h5>
                                    <ul class="blocks-2">
                                        <li class="mega-menu m-0">
                                            <ul class="list-icons">
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.task.project.index') }}">Projetos</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.task.action.index') }}">Ações</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.task.priority.index') }}">Prioridades</a>
                                                </li>
                                                <li>
                                                    <i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                    <a href="{{ route('system.configuration.task.project-template.index') }}">Modelo de Projeto</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->
    @endif

    <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                    <span class="avatar avatar-online">
                        <?php
                        $image = asset('uploads/users/grunt.png');
                        if(Auth::user()->image){
                            $image = asset('uploads/users/'.Auth::user()->image);
                        }
                        ?>
                        <img src="{{ $image }}" alt="{{ Auth::user()->name }}" width="20" height="20">
                        <i></i>
                    </span>
                </a>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="{{ route('system.configuration.user.edit', Auth::user()->id) }}" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Perfil</a>
                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Notificações</a>
                    <!--
                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Avisos</a>
                    -->
                    <a class="dropdown-item" href="{{ route('system.configuration.user.password.edit', Auth::user()->id) }}" role="menuitem"><i class="icon fa-key" aria-hidden="true"></i> Alterar Senha</a>
                    <div class="dropdown-divider" role="presentation"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Sair</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @include('system.layouts.notifications')
            <!--
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages"
                   aria-expanded="false" data-animation="scale-up" role="button">
                    <i class="icon wb-envelope" aria-hidden="true"></i>
                    <span class="badge badge-pill badge-info up">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                    <div class="dropdown-menu-header" role="presentation">
                        <h5>MESSAGES</h5>
                        <span class="badge badge-round badge-info">New 3</span>
                    </div>

                    <div class="list-group" role="presentation">
                        <div data-role="container">
                            <div data-role="content">
                                <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                        <div class="pr-10">
                            <span class="avatar avatar-sm avatar-online">
                              <img src="../../../global/portraits/2.jpg" alt="..." />
                              <i></i>
                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Mary Adams</h6>
                                            <div class="media-meta">
                                                <time datetime="2018-06-17T20:22:05+08:00">30 minutes ago</time>
                                            </div>
                                            <div class="media-detail">Anyways, i would like just do it</div>
                                        </div>
                                    </div>
                                </a>
                                <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                        <div class="pr-10">
                            <span class="avatar avatar-sm avatar-off">
                              <img src="../../../global/portraits/3.jpg" alt="..." />
                              <i></i>
                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Caleb Richards</h6>
                                            <div class="media-meta">
                                                <time datetime="2018-06-17T12:30:30+08:00">12 hours ago</time>
                                            </div>
                                            <div class="media-detail">I checheck the document. But there seems</div>
                                        </div>
                                    </div>
                                </a>
                                <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                        <div class="pr-10">
                            <span class="avatar avatar-sm avatar-busy">
                              <img src="../../../global/portraits/4.jpg" alt="..." />
                              <i></i>
                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">June Lane</h6>
                                            <div class="media-meta">
                                                <time datetime="2018-06-16T18:38:40+08:00">2 days ago</time>
                                            </div>
                                            <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                                        </div>
                                    </div>
                                </a>
                                <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                        <div class="pr-10">
                            <span class="avatar avatar-sm avatar-away">
                              <img src="../../../global/portraits/5.jpg" alt="..." />
                              <i></i>
                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Edward Fletcher</h6>
                                            <div class="media-meta">
                                                <time datetime="2018-06-15T20:34:48+08:00">3 days ago</time>
                                            </div>
                                            <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-menu-footer" role="presentation">
                        <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                            <i class="icon wb-settings" aria-hidden="true"></i>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                            See all messages
                        </a>
                    </div>
                </div>
            </li>
            -->
        </ul>
        <!-- End Navbar Toolbar Right -->
    </div>
    <!-- End Navbar Collapse -->

    <!-- Site Navbar Seach
    <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
            <div class="form-group">
                <div class="input-search">
                    <i class="input-search-icon wb-search" aria-hidden="true"></i>
                    <input type="text" class="form-control" name="site-search" placeholder="Search...">
                    <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search" data-toggle="collapse" aria-label="Close"></button>
                </div>
            </div>
        </form>
    </div> -->
    <!-- End Site Navbar Seach -->
</div>
