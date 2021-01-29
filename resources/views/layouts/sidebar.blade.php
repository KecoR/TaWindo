<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo.png') }}" width="65"
             alt="Infyom Logo">
        @if (\Auth::user())
            <a href="{{ url('/') }}"></a>
        @else
            <a href="{{ route('guestHome') }}"></a>
        @endif
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        @if (\Auth::user())
            <a href="{{ url('/') }}" class="small-sidebar-text">
        @else
            <a href="{{ route('guestHome') }}" class="small-sidebar-text">
        @endif
            <img class="navbar-brand-full" src="{{ asset('img/logo.png') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
