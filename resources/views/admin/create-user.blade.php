@extends('layouts.app')

@section('content')


{{-- Success Message --}}
@if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">

    {{ session('success') }}

    <button type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

@endif

{{-- Error Message --}}
@if($errors->any())

<div class="alert alert-danger alert-dismissible fade show" role="alert">

    <ul class="mb-0">

        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

    <button type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

@endif

<div class="card shadow border-0">

    <div class="card-header">
        Create User
    </div>

    <div class="card-body">

        <form method="POST"
            action="{{ route('users.store') }}">

            @csrf

            <div class="mb-3">

                <label>Name</label>

                <input type="text"
                    name="name"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Email</label>

                <input type="email"
                    name="email"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Password</label>

                <input type="password"
                    name="password"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Role</label>

                <select name="role"
                    class="form-control">

                    <option value="admin">
                        Admin
                    </option>

                    <option value="member">
                        Member
                    </option>

                </select>

            </div>

            <button class="btn btn-primary">

                Create User

            </button>

        </form>

    </div>

</div>

@endsection