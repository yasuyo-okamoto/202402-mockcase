@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endsection

@section('content')
<div class="list__page">
    <h1>Worklogs</h1>
    <div class="row">
        <div class="col-md-12">
            <!-- Pagination links -->
            <div class="text-center">
                {{ $worklogs->links() }}
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Work Start</th>
                        <th>Work End</th>
                        <th>Total Work Time</th>
                        <th>Net Work Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($worklogs as $worklog)
                    <tr>
                        <td>{{ $worklog->date }}</td>
                        <td>{{ $worklog->workstart }}</td>
                        <td>{{ $worklog->workend }}</td>
                        <td>{{ $worklog->totalWorkTime() }}</td>
                        <td>{{ $worklog->netWorkTime() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination links -->
            <div class="text-center">
                {{ $worklogs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
