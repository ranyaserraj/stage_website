@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hospitalization Reports</h1>
    <a href="{{ route('hospitalization-reports.create') }}" class="btn btn-primary">Add Report</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>CNE</th>
                <th>Hospitalization Start</th>
                <th>Hospitalization End</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->name }}</td>
                    <td>{{ $report->surname }}</td>
                    <td>{{ $report->cne }}</td>
                    <td>{{ $report->hospitalization_start }}</td>
                    <td>{{ $report->hospitalization_end }}</td>
                    <td>
                        <a href="{{ route('hospitalization-reports.show', $report->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('hospitalization-reports.edit', $report->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('hospitalization-reports.destroy', $report->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
