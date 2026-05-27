@extends('layouts.app')

@section('title', 'Super Admin Dashboard')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>
        Registered Companies
    </h3>

    <a href="{{ route('companies.create') }}" class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Register Company

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <table class="table table-bordered align-middle">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Users</th>
                    <th>Created URLs</th>
                    <th>Hits URLs</th>
                    <th>Created At</th>
                    <!-- <th>Action</th> -->
                </tr>

            </thead>

            <tbody>

                @forelse($companies as $company)

                    <tr>

                        <td> {{ $loop->iteration }}</td>

                        <td>{{ $company->name }}</td>

                        <td>{{ $company->email }}</td>

                        <td>{{ $company->users_count ?? 0 }}</td>

                        <td>{{ $company->short_urls_count  ?? 0 }}</td>

                        <td>{{ $company->short_urls_sum_hit_count ?? 0 }}</td>

                        <td>
                            {{ $company->created_at->format('d M Y') }}
                        </td>

                        <!-- <td>

                            <a href="#" class="btn btn-sm btn-info">
                                View
                            </a>

                            <a href="#" class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <a href="#" class="btn btn-sm btn-danger">
                                Delete
                            </a>

                        </td> -->

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">
                            No Companies Found
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection