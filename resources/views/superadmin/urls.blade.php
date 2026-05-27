@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">

        <h4>All Generated URLs</h4>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead class="table-dark">

                <tr>

                    <th>#</th>
                    <th>Short URL</th>
                    <th>Total Hits</th>
                    <th>User</th>

                </tr>

            </thead>

            <tbody>

                @foreach($urls as $url)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        <a href="{{ url('/s/' . $url->short_code) }}"
                           target="_blank">

                            {{ url('/s/' . $url->short_code) }}

                        </a>

                    </td>

                    <td>{{ $url->hit_count ?? 0 }}</td>

                    <td>{{ $url->user->name ?? 'N/A' }}</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection