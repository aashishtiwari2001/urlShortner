@extends('layouts.app')

@section('title', 'Create Short URL')

@section('content')

<div class="card shadow border-0 mb-4">

    <div class="card-header">

        <h4>Create Short URL</h4>

    </div>

    <div class="card-body">

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

        @if(session('short_url'))

        <div class="alert alert-info">

            <strong>Generated URL:</strong>

            <a href="{{ session('short_url') }}"
                target="_blank">

                {{ session('short_url') }}

            </a>

        </div>

        @endif

        <form method="POST"
            action="{{ route('urls.store') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Original URL

                </label>

                <input
                    type="url"
                    name="original_url"
                    class="form-control"
                    placeholder="https://example.com"
                    required>

                @error('original_url')

                <small class="text-danger">

                    {{ $message }}

                </small>

                @enderror

            </div>

            <button type="submit"
                class="btn btn-primary">

                Generate Short URL

            </button>

        </form>

    </div>

</div>

<div class="card shadow border-0">

    <div class="card-header d-flex justify-content-between">

        <h4>Generated URLs</h4>

        <span class="badge bg-primary">

            Total :
            {{ $urls->count() }}

        </span>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>Original URL</th>

                        <th>Short URL</th>

                        <th>Total Hits</th>

                        <th>Created By</th>

                        <th>Created Date</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($urls as $url)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td style="max-width:250px">

                            <a href="{{ $url->original_url }}"
                                target="_blank">

                                {{ $url->original_url ?? 'N/A' }}

                            </a>

                        </td>

                        <td>

                            <a href="{{ url('/s/' . $url->short_code) }}"
                                target="_blank">

                                {{ url('/s/' . $url->short_code) ?? 'N/A' }}

                            </a>

                        </td>

                        <td>

                            <span class="badge bg-success">

                                {{ $url->hit_count ?? 0 }}

                            </span>

                        </td>

                        <td>

                            {{ $url->user->name ?? 'N/A' }}

                        </td>

                        <td>

                            {{ $url->created_at->format('d M Y') ?? 'N/A' }}

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="text-center">

                            No URLs Found

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection