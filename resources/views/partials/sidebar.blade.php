<div class="sidebar">

    <h4 class="text-white text-center py-4">
        Dashboard
    </h4>

    {{-- COMMON DASHBOARD --}}

    @if(auth()->user()->role == 'super_admin')

        <a href="{{ route('superadmin.dashboard') }}">

            <i class="bi bi-speedometer2"></i>

            Super Admin Dashboard

        </a>

        <a href="{{ route('companies.create') }}">

            <i class="bi bi-buildings"></i>

            Create Company

        </a>

        <a href="{{ route('superadmin.urls') }}">

            <i class="bi bi-link-45deg"></i>

            All URLs

        </a>

        <a href="{{ route('superadmin.reports') }}">

            <i class="bi bi-bar-chart"></i>

            Reports

        </a>

    @endif


    {{-- ADMIN MENU --}}

    @if(auth()->user()->role == 'admin')

        <a href="{{ route('admin.dashboard') }}">

            <i class="bi bi-speedometer2"></i>

            Admin Dashboard

        </a>

        <a href="{{ route('users.create') }}">

            <i class="bi bi-people"></i>

            Create Users

        </a>

        <a href="{{ route('urls.create') }}">

            <i class="bi bi-link-45deg"></i>

            Manage URLs

        </a>

    @endif


    {{-- MEMBER MENU --}}

    @if(auth()->user()->role == 'member')

        <a href="{{ route('member.dashboard') }}">

            <i class="bi bi-speedometer2"></i>

            Member Dashboard

        </a>

        <a href="{{ route('urls.create') }}">

            <i class="bi bi-link-45deg"></i>

            My URLs

        </a>

    @endif

</div>