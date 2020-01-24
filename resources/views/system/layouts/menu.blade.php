<div class="site-menubar site-menubar-light">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category">Menu</li>
                    <li class="dropdown site-menu-item">
                        <a data-toggle="dropdown" href="{{ route('system.home') }}" data-dropdown-toggle="false">
                            <i class="site-menu-icon fa-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashborad</span>
                        </a>
                    </li>
                    <!--
                    <li class="dropdown site-menu-item has-sub ">
                        <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                            <i class="site-menu-icon fa-tasks" aria-hidden="true"></i>
                            <span class="site-menu-title">Tarefas</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="site-menu-scroll-wrap is-list">
                                <div>
                                    <div>
                                        <ul class="site-menu-sub site-menu-normal-list">
                                            <li class="site-menu-item has-sub">
                                                <a href="javascript:void(0)">
                                                    <span class="site-menu-title">Errors</span>
                                                    <span class="site-menu-arrow"></span>
                                                </a>
                                                <ul class="site-menu-sub">
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/error-400.html">
                                                            <span class="site-menu-title">400 Bad Request</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/error-403.html">
                                                            <span class="site-menu-title">403 Forbidden</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/error-404.html">
                                                            <span class="site-menu-title">404 Not Found</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/error-500.html">
                                                            <span class="site-menu-title">500 Internal Server Error</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/error-503.html">
                                                            <span class="site-menu-title">503 Service Unavailable</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/faq.html">
                                                    <span class="site-menu-title">FAQ</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/gallery.html">
                                                    <span class="site-menu-title">Gallery</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/gallery-grid.html">
                                                    <span class="site-menu-title">Gallery Grid</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/search-result.html">
                                                    <span class="site-menu-title">Search Result</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item has-sub">
                                                <a href="javascript:void(0)">
                                                    <span class="site-menu-title">Maps</span>
                                                    <span class="site-menu-arrow"></span>
                                                </a>
                                                <ul class="site-menu-sub">
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/map-google.html">
                                                            <span class="site-menu-title">Google Maps</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/map-vector.html">
                                                            <span class="site-menu-title">Vector Maps</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/maintenance.html">
                                                    <span class="site-menu-title">Maintenance</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/forgot-password.html">
                                                    <span class="site-menu-title">Forgot Password</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/lockscreen.html">
                                                    <span class="site-menu-title">Lockscreen</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/login.html">
                                                    <span class="site-menu-title">Login</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/register.html">
                                                    <span class="site-menu-title">Register</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/login-v2.html">
                                                    <span class="site-menu-title">Login V2</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/register-v2.html">
                                                    <span class="site-menu-title">Register V2</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/login-v3.html">
                                                    <span class="site-menu-title">Login V3</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/register-v3.html">
                                                    <span class="site-menu-title">Register V3</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/user.html">
                                                    <span class="site-menu-title">User List</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/invoice.html">
                                                    <span class="site-menu-title">Invoice</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item active">
                                                <a class="animsition-link" href="../pages/blank.html">
                                                    <span class="site-menu-title">Blank Page</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item has-sub">
                                                <a href="javascript:void(0)">
                                                    <span class="site-menu-title">Email</span>
                                                    <span class="site-menu-arrow"></span>
                                                </a>
                                                <ul class="site-menu-sub">
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/email-articles.html">
                                                            <span class="site-menu-title">Articles</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/email-welcome.html">
                                                            <span class="site-menu-title">Welcome</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/email-post.html">
                                                            <span class="site-menu-title">Post</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/email-thumbnail.html">
                                                            <span class="site-menu-title">Thumbnail</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="../pages/email-news.html">
                                                            <span class="site-menu-title">News</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/code-editor.html">
                                                    <span class="site-menu-title">Code Editor</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/profile.html">
                                                    <span class="site-menu-title">Profile</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/profile-v2.html">
                                                    <span class="site-menu-title">Profile V2</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/profile-v3.html">
                                                    <span class="site-menu-title">Profile V3</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/site-map.html">
                                                    <span class="site-menu-title">Sitemap</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="../pages/project.html">
                                                    <span class="site-menu-title">Project</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    -->
                    @include('system.layouts.menu.social-media')
                    <li class="dropdown site-menu-item has-section has-sub">
                        <a data-toggle="dropdown" href="{{ route('system.schedule.index') }}" data-dropdown-toggle="false">
                            <i class="site-menu-icon wb-calendar" aria-hidden="true"></i>
                            <span class="site-menu-title">Agenda</span>
                        </a>
                    </li>
                    <li class="site-menu-item @if(isset($config) && $config['activeMenu'] == 'client') active @endif">
                        <a  href="{{ route('system.client.index') }}" title="Clientes">
                            <i class="site-menu-icon wb-users"></i>
                            <span class="site-menu-title">Clientes</span>
                        </a>
                    </li>
                    <li class="site-menu-item @if(isset($config) && $config['activeMenu'] == 'segment') active @endif">
                        <a  href="{{ route('system.configuration.segment-client.index') }}" title="Segmentos">
                            <i class="site-menu-icon wb-users"></i>
                            <span class="site-menu-title">Segmentos</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
