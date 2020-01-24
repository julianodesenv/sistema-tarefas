<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand navbar-brand-center" href="{{ route('system.home') }}">
            <img class="navbar-brand-logo navbar-brand-logo-normal" src="{{ asset('assets/images/main-logo.png') }}" title="{{ config('app.name') }}">
            <img class="navbar-brand-logo navbar-brand-logo-special" src="{{ asset('assets/images/main-logo.png') }}" title="{{ config('app.name') }}">
        </a>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search" data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon wb-search" aria-hidden="true"></i>
        </button>
    </div>
    @include('system.layouts.navbar-container')
</nav>
@include('system.layouts.menu')
