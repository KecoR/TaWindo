<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    @if (\Auth::user())
        <a href="{{ url('/') }}" class="nav-link">
    @else
        <a href="{{ route('guestHome') }}" class="nav-link">
    @endif
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

@if (\Auth::user())
    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
            <a href="{{ route('lensaIndex') }}" class="nav-link">
            <i class=" fas fa-glasses"></i><span>Daftar Lensa Kacamata</span>
        </a>
    </li>

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a href="{{ route('frameIndex') }}" class="nav-link">
        <i class=" fas fa-glasses"></i><span>Daftar Frame Kacamata</span>
        </a>
    </li>
@endif