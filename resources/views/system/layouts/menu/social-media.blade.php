<!-- IF para verificar se é SM, ADM ou GERENTE -->
@inject("clientsSM", "\AgenciaS3\Http\Controllers\System\SocialMedia\ClientController")
<li class="dropdown site-menu-item has-section has-sub">
    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
        <i class="site-menu-icon wb-check" aria-hidden="true"></i>
        <span class="site-menu-title">Follow</span>
        <span class="site-menu-arrow"></span>
    </a>
    <ul class="dropdown-menu site-menu-sub site-menu-section-wrap blocks-md-3">
        <li class="site-menu-section site-menu-item has-sub">
            <header>
                <span class="site-menu-title">Geral</span>
                <span class="site-menu-arrow"></span>
            </header>
            <div class="site-menu-scroll-wrap is-section">
                <div>
                    <div>
                        <ul class="site-menu-sub site-menu-section-list">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('system.social-media.post.index') }}">
                                    <span class="site-menu-title">Todos</span>
                                </a>
                            </li>
                            @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('system.social-media.post.all') }}">
                                    <span class="site-menu-title">Todos Usuários</span>
                                </a>
                            </li>
                            @endif
                            <li class="site-menu-item">
                                <a class="animsition-link" href="javascript:void(0);">
                                    <span class="site-menu-title">Calendário</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        <?php $clients = $clientsSM->getClientsUsers(Auth::user()->id); ?>
        @if(!$clients->isEmpty())
        <li class="site-menu-section site-menu-item has-sub">
            <header>
                <span class="site-menu-title">Clientes</span>
                <span class="site-menu-arrow"></span>
            </header>
            <div class="site-menu-scroll-wrap is-section">
                <div>
                    <div>
                        <ul class="site-menu-sub site-menu-section-list">
                            @foreach($clients as $row)
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('system.social-media.client.index', $row->client_id) }}">
                                    <span class="site-menu-title">{{ $row->client->name }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        @endif
        <!--
        <li class="site-menu-section site-menu-item has-sub">
            <header>
                <span class="site-menu-title">Advanced UI</span>
                <span class="site-menu-arrow"></span>
            </header>
            <div class="site-menu-scroll-wrap is-section">
                <div>
                    <div>
                        <ul class="site-menu-sub site-menu-section-list">
                            <li class="site-menu-item hidden-sm-down site-tour-trigger">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Tour</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/animation.html">
                                    <span class="site-menu-title">Animation</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/highlight.html">
                                    <span class="site-menu-title">Highlight</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/lightbox.html">
                                    <span class="site-menu-title">Lightbox</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/scrollable.html">
                                    <span class="site-menu-title">Scrollable</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/rating.html">
                                    <span class="site-menu-title">Rating</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/context-menu.html">
                                    <span class="site-menu-title">Context Menu</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/alertify.html">
                                    <span class="site-menu-title">Alertify</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/masonry.html">
                                    <span class="site-menu-title">Masonry</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/treeview.html">
                                    <span class="site-menu-title">Treeview</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/toastr.html">
                                    <span class="site-menu-title">Toastr</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/maps-vector.html">
                                    <span class="site-menu-title">Vector Maps</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/maps-google.html">
                                    <span class="site-menu-title">Google Maps</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/sortable-nestable.html">
                                    <span class="site-menu-title">Sortable &amp; Nestable</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../advanced/bootbox-sweetalert.html">
                                    <span class="site-menu-title">Bootbox &amp; Sweetalert</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        <li class="site-menu-section site-menu-item has-sub">
            <header>
                <span class="site-menu-title">Structure</span>
                <span class="site-menu-arrow"></span>
            </header>
            <div class="site-menu-scroll-wrap is-section">
                <div>
                    <div>
                        <ul class="site-menu-sub site-menu-section-list">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/alerts.html">
                                    <span class="site-menu-title">Alerts</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/ribbon.html">
                                    <span class="site-menu-title">Ribbon</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/pricing-tables.html">
                                    <span class="site-menu-title">Pricing Tables</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/overlay.html">
                                    <span class="site-menu-title">Overlay</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/cover.html">
                                    <span class="site-menu-title">Cover</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/timeline-simple.html">
                                    <span class="site-menu-title">Simple Timeline</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/timeline.html">
                                    <span class="site-menu-title">Timeline</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/step.html">
                                    <span class="site-menu-title">Step</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/comments.html">
                                    <span class="site-menu-title">Comments</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/media.html">
                                    <span class="site-menu-title">Media</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/chat.html">
                                    <span class="site-menu-title">Chat</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/testimonials.html">
                                    <span class="site-menu-title">Testimonials</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/nav.html">
                                    <span class="site-menu-title">Nav</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/navbars.html">
                                    <span class="site-menu-title">Navbars</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/blockquotes.html">
                                    <span class="site-menu-title">Blockquotes</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/pagination.html">
                                    <span class="site-menu-title">Pagination</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../structure/breadcrumbs.html">
                                    <span class="site-menu-title">Breadcrumbs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        -->
    </ul>
</li>
