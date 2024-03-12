<nav>
    <a href="{{route('appointments.create')}}" class="hover-line">Prenota un appuntamento</a>

    @guest
        <a href="{{ route('login') }}" class="hover-line">Accedi</a>
        <a href="{{ route('register') }}" class="hover-line">Registrati</a>
    @else
        <a href="{{route('appointments.index')}}" class="hover-line">{{ Auth::user()->name }}</a>

        <a href="{{ route('logout') }}" class="hover-line" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest

    <div class="animation start-home"></div>
</nav>