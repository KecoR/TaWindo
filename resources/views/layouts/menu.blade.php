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

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a href="{{ route('orderIndex') }}" class="nav-link">
        <i class=" fas fa-shopping-basket"></i><span>Pemesanan Kacamata</span>
        </a>
    </li>
@endif

@if (!\Auth::user())
    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a href="{{ route('guestFrame') }}" class="nav-link">
        <i class=" fas fa-stream"></i><span>Daftar Frame</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a href="{{ route('guestLensa') }}" class="nav-link">
        <i class=" fas fa-stream"></i><span>Daftar Lensa</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a href="{{ route('newOrderIndex') }}" class="nav-link">
        <i class=" fas fa-shopping-basket"></i><span>Pemesanan Kacamata</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a href="{{ route('mataMinus') }}" class="nav-link">
        <i class="fas fa-eye"></i><span>Pemeriksaan mata minus</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a href="{{ route('mataPlus') }}" class="nav-link">
        <i class="fas fa-eye"></i><span>Pemeriksaan mata plus</span>
        </a>
    </li>
@endif

<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a href="{{ route('aboutIndex') }}" class="nav-link">
    <i class="fas fa-user"></i><span>Informasi Kontak Ahli Kacamata</span>
    </a>
</li>