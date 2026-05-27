@extends('layouts.app')

@section('title', 'Create Company')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Create Company</h4>
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('companies.store') }}">

            @csrf

            <div class="mb-3">
                <label>Company Name</label>

                <input
                    type="text"
                    name="company_name"
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label>Company Email</label>

                <input
                    type="email"
                    name="company_email"
                    class="form-control"
                >
            </div>

            <hr>

            <h5>Admin Details</h5>

            <div class="mb-3">
                <label>Admin Name</label>

                <input
                    type="text"
                    name="admin_name"
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label>Admin Email</label>

                <input
                    type="email"
                    name="admin_email"
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                >
            </div>

            <button class="btn btn-primary">
                Create Company
            </button>

        </form>

    </div>

</div>

@endsection