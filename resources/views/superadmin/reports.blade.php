@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">

        <h4>URL Reports</h4>

    </div>

    <div class="card-body">

        <form method="GET" class="mb-4">

            <select name="filter"
                class="form-select">

                <option value="this_week">

                    This Week

                </option>

                <option value="last_week">

                    Last Week

                </option>

                <option value="this_month">

                    This Month

                </option>

                <option value="last_month">

                    Last Month

                </option>

            </select>

            <button class="btn btn-primary mt-2">

                Filter

            </button>

        </form>

        <table class="table table-bordered">

            <thead class="table-dark">

                <tr>

                    <th>#</th>

                    <th>Short URL</th>

                    <th>Total Hits</th>

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

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection