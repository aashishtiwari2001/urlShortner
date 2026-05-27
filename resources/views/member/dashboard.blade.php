@extends('layouts.app')

@section('title', 'Member Dashboard')

@section('content')

<div class="row mb-4">

    <div class="col-md-6">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h5>Total URLs</h5>

                <h2>{{ $totalUrls }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h5>Total Hits</h5>

                <h2>{{ $totalHits }}</h2>

            </div>

        </div>

    </div>

</div>

<div class="card shadow border-0">

    <div class="card-header d-flex justify-content-between">

        <h4>My Short URLs</h4>

        <a href="{{ route('urls.create') }}"
           class="btn btn-primary btn-sm">

            Create URL

        </a>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>Original URL</th>

                        <th>Short URL</th>

                        <th>Total Hits</th>

                        <th>Created Date</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($urls as $url)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <a href="{{ $url->original_url }}"
                                   target="_blank">

                                    {{ $url->original_url }}

                                </a>

                            </td>

                            <td>

                                <a href="{{ url('/s/' . $url->short_code) }}"
                                   target="_blank">

                                    {{ url('/s/' . $url->short_code) }}

                                </a>

                            </td>

                            <td>

                                <span class="badge bg-success">

                                    {{ $url->total_hits }}

                                </span>

                            </td>

                            <td>

                                {{ $url->created_at->format('d M Y') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
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