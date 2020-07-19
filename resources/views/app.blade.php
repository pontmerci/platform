<!DOCTYPE html>
<html lang="{{  app()->getLocale() }}" data-controller="layouts--html-load">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','ORCHID') - @yield('description','Admin')</title>
    <meta name="csrf_token" content="{{  csrf_token() }}" id="csrf_token" data-turbolinks-permanent>
    <meta name="auth" content="{{  Auth::check() }}" id="auth" data-turbolinks-permanent>
    @if(file_exists(public_path('/css/orchid/orchid.css')))
        <link rel="stylesheet" type="text/css" href="{{  mix('/css/orchid/orchid.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{  orchid_mix('/css/orchid.css','orchid') }}">
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            crossorigin="anonymous"></script>
    @stack('head')

    <meta name="turbolinks-root" content="{{  Dashboard::prefix() }}">
    <meta name="dashboard-prefix" content="{{  Dashboard::prefix() }}">

    <script src="{{ orchid_mix('/js/manifest.js','orchid') }}" type="text/javascript"></script>
    <script src="{{ orchid_mix('/js/vendor.js','orchid') }}" type="text/javascript"></script>
    <script src="{{ orchid_mix('/js/orchid.js','orchid') }}" type="text/javascript"></script>

    @foreach(Dashboard::getResource('stylesheets') as $stylesheet)
        <link rel="stylesheet" href="{{  $stylesheet }}">
    @endforeach

    @stack('stylesheets')

    @foreach(Dashboard::getResource('scripts') as $scripts)
        <script src="{{  $scripts }}" defer type="text/javascript"></script>
    @endforeach
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('platform.index')}}">
        @includeFirst([config('platform.template.header'), 'platform::header'])
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Search-->
    {{--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                   aria-describedby="basic-addon2"/>
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>--}}
@include('platform::partials.search')

{{--@include('platform::partials.notificationProfile')--}}

<!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                {{--<a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>--}}

                {{--                <a class="dropdown-item" href="login.html">Logout</a>--}}

                {!! Dashboard::menu()->render('Profile','platform::partials.dropdownMenu') !!}

                @if(Dashboard::menu()->container->where('location','Profile')->isNotEmpty())
                    <div class="dropdown-divider"></div>
                @endif

                @if(Auth::user()->hasAccess('platform.systems.index'))
                    <a href="{{ route('platform.systems.index') }}" class="dropdown-item">
                        <i class="icon-settings mr-2" aria-hidden="true"></i>
                        <span>{{ __('Systems') }}</span>
                    </a>
                @endif

                @if(\Orchid\Access\UserSwitch::isSwitch())
                    <a href="#"
                       class="dropdown-item"
                       data-controller="layouts--form"
                       data-action="layouts--form#submitByForm"
                       data-layouts--form-id="return-original-user"
                    >
                        <i class="icon-logout mr-2" aria-hidden="true"></i>
                        <span>{{ __('Back to my account') }}</span>
                    </a>
                    <form id="return-original-user"
                          class="hidden"
                          data-controller="layouts--form"
                          data-action="layouts--form#submit"
                          action="{{ route('platform.switch.logout') }}"
                          method="POST">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('platform.logout') }}"
                       class="dropdown-item"
                       data-controller="layouts--form"
                       data-action="layouts--form#submitByForm"
                       data-layouts--form-id="logout-form"
                       dusk="logout-button">
                        <i class="icon-logout mr-2" aria-hidden="true"></i>
                        <span>{{ __('Sign out') }}</span>
                    </a>
                    <form id="logout-form"
                          class="hidden"
                          action="{{ route('platform.logout') }}"
                          method="POST"
                          data-controller="layouts--form"
                          data-action="layouts--form#submit"
                    >
                        @csrf
                    </form>
                @endif
            </div>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark animate__animated animate__fadeInLeft" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    @yield('nav-menu')
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('body-right')
        </main>
    </div>
</div>

{{--<div class="app row m-n" id="app" data-controller="@yield('controller')" @yield('controller-data')>
    <div class="container-lg">
        <div class="row">
            <div class="aside col-xs-12 col-md-2 offset-xxl-0 col-xl-2 col-xxl-3 no-padder bg-dark">
                <div class="d-md-flex align-items-start flex-column d-sm-block h-full">
                    @yield('body-left')
                </div>
            </div>
            <div class="col-md col-xl col-xxl-9 bg-white shadow no-padder min-vh-100 overflow-hidden">
                @yield('body-right')
            </div>
        </div>
    </div>


@include('platform::partials.toast')
</div>--}}



@stack('scripts')


</body>
</html>
