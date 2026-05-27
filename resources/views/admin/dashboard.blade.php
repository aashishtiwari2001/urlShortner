@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h5>Total Users</h5>

                <h2>{{ $totalUsers }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h5>Total URLs</h5>

                <h2>{{ $totalUrls }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h5>Total Hits</h5>

                <h2>{{ $totalHits }}</h2>

            </div>

        </div>

    </div>

</div>

<div class="d-flex gap-2 mb-4">

    <a href="{{ route('users.create') }}"
       class="btn btn-primary">

        Create User

    </a>

    <a href="{{ route('urls.create') }}"
       class="btn btn-success">

        Create Short URL

    </a>

</div>

<div class="card shadow border-0">

    <div class="card-header">
        Company Users
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>

                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                <tr>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>{{ ucfirst($user->role) }}</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection