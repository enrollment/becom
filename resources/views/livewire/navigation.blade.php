<nav class="navbar d-flex navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="/">BECOM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content"
            aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside">Categorías</a>
                    <ul class="dropdown-menu shadow">

                        @foreach ($categories as $category)
                            <li class="dropend">
                                <a href="{{ route('categories.show' , $category) }}" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside"> {{ $category->name }}</a>
                                <ul class="dropdown-menu shadow">
                                    <x-navigation-subcategories :category="$category" />
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
                @livewire('navigation-search')
                @livewire('navigation-cart')
                @auth
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownProfile" role="button"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                            <i style="font-size: 1.5rem" class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownProfile">
                            <li><span class="dropdown-item-text text-success">Hi {{ Auth::user()->name }}!</span></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('orders.index') }}">{{__('Mis ordenes') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">{{__('Profile') }}</a></li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit(); " role="button">
                                        {{__('Logout') }}
                                    </a>
                                </li>
                            </form>
                        </ul>
                    </li>
                @else

                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownProfile" role="button"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                            <i style="font-size: 1.5rem" class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownProfile">
                            <li><a class="dropdown-item" aria-current="page" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" aria-current="page" href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </li>

                @endauth

            </ul>

        </div>
    </div>
</nav>
