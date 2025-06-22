<style>
    .text-light-blue {
        color: #22A9F0; /* Light blue color */
    }
</style>

<nav class="navbar navbar-expand-lg bg-deep-blue">
    <div class="container-fluid">
        <a class="navbar-brand text-light-blue" href="#"><i <i class="fa-solid fa-water"></i>></i> {{ $title }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light-blue" href={{ route('home') }}><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light-blue" href={{ route('map') }}><i class="fa-solid fa-map-location-dot"></i> Maps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light-blue" href={{ route('table') }}><i class="fa-solid fa-table"></i> Table</a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link text-light-blue" href={{ route('api.points') }}><i class="fa-solid fa-database"></i> Data</a>
                </li>
    
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-link text-danger" type="submit">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </li>
                @endauth

                @guest
                <li class="nav-item">
                    <a class="nav-link text-light-blue" href={{ route('login') }}>
                        <i class="fa-solid fa-right-to-bracket"></i> Login
                    </a>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
