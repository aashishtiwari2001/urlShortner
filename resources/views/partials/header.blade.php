<nav class="navbar navbar-expand-lg bg-white shadow-sm rounded px-3 mb-4">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            URL Shortener
        </a>

        <div class="d-flex align-items-center">

            <span class="me-3">
                Welcome,
                {{ auth()->user()->name ?? 'Super Admin' }}
            </span>

            <form method="POST" action="{{ route('logout') }}">

                @csrf
                <button class="btn btn-danger btn-sm">

                    Logout

                </button>
            </form>

        </div>

    </div>

</nav>