<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title') - {{ config('office.name', 'Glitter Admin') }}</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/glitter-admin.css') }}" media="all" />
@stack('styles')
<script>
window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
]); ?>
</script>
</head>
<body>

<div id="glitter-admin" class="admin-screen">

<nav class="drawer-nav" :class="{ in: drawerOpen }">
    <div class="drawer-nav-store dropdown">
        <a href="#" class="store-menu" data-toggle="dropdown">
            <i class="fa fa-bell fa-fw float-right" aria-hidden="true"></i>
            <span class="store-name">{{ $store->name }}</span>
            <i class="fa fa-caret-down fa-fw" aria-hidden="true"></i><br>
            <small><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i>{{ $me->name }}</small>
        </a>
        <div class="dropdown-menu">
            @include('glitter.office::partials.member-dropdown')
        </div>
    </div>
    <div class="drawer-nav-content">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link{{ Request::is('office') ? ' active' : '' }}" href="{{ route('glitter.office.index') }}"><i class="fa fa-home fa-fw" aria-hidden="true"></i>ホーム<span class="notify"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ Request::is('office/orders*') ? ' active' : '' }}" href="{{ route('glitter.office.orders.index') }}"><i class="fa fa-inbox fa-fw" aria-hidden="true"></i>受注管理<span class="badge">9,999</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ Request::is('office/products*') ? ' active' : '' }}" href="{{ route('glitter.office.products.products') }}"><i class="fa fa-tag fa-fw" aria-hidden="true"></i>商品管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ Request::is('office/customers*') ? ' active' : '' }}" href="{{ route('glitter.office.customers.index') }}"><i class="fa fa-users fa-fw" aria-hidden="true"></i>顧客リスト</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i>レポート</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-scissors fa-fw" aria-hidden="true"></i>クーポン</a>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>オンラインストア</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>Syn Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-wordpress fa-fw" aria-hidden="true"></i>WordPress</a>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link{{ Request::is('office/settings*') ? ' active' : '' }}" href="{{ route('glitter.office.settings.index') }}"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>ストア設定<span class="badge">NEW</span></a>
            </li>
        </ul>
    </div>
</nav>{{-- /.drawer-nav --}}
<transition name="modal-backdrop">
    <div v-if="drawerOpen" v-cloak @click="toggleDrawer" class="drawer-nav-backdrop"></div>
</transition>

<header class="header-section">
@hasSection('header')
@yield('header')
@else
<h1 class="title">
    <i class="fa fa-file-o fa-fw" aria-hidden="true"></i>@yield('title')
</h1>
@endif
<a @click.prevent="toggleDrawer" href="#" class="drawer-nav-toggle">
    <i v-if="!drawerOpen" class="fa fa-bars fa-fw" aria-hidden="true"></i>
    <i v-else class="fa fa-window-close fa-fw" aria-hidden="true"></i>
</a>
</header>{{-- /.header-section --}}
@section('main')
<main class="main-section">

@hasSection('nav')
<div class="nav-wrapper">
@yield('nav')
</div>{{-- /.nav-wrapper --}}
@endif

<div class="content-wrapper">

@if(!$flash_message->isEmpty())
<div class="container">{!! join($flash_message->all()) !!}</div>
@endif

@yield('content')

</div>{{-- /.content-wrapper --}}

<div class="footer-container container">
    <div class="row mt-5 py-3 justify-content-center">
        <div class="col col-auto text-muted small">
            Thanks for testing <a href="https://github.com/highday/glitter" target="_blank">Glitter</a> ✨️
        </div>
    </div>
</div>

</main>{{-- /.main-section --}}
@show

@include('glitter.office::partials.logout-form')
@yield('modal')
</div>{{-- /.admin-screen --}}

{{-- Scripts --}}
<script src="{{ asset('/js/glitter-admin.js') }}"></script>
@yield('scripts')

</body>
</html>