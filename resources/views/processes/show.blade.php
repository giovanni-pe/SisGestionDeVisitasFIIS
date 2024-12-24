@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Details for Visitor Representative: {{ $representative->user->name }}</h1>

    <p><strong>Email:</strong> {{ $representative->user->email }}</p>
    <p><strong>Identification:</strong> {{ $representative->identification }}</p>
    <p><strong>Phone:</strong> {{ $representative->phone }}</p>

    <h2>Associated Requests</h2>
    @if ($representative->requests->isEmpty())
        <p>No requests associated with this representative.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Reason</th>
                    <th>Date</th>
                    <th>Visitor Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($representative->requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->request_type }}</td>
                    <td>{{ $request->request_reason }}</td>
                    <td>{{ $request->requested_date }}</td>
                    <td>{{ $request->visitor_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
