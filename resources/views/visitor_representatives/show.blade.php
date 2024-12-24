@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Details for Representative: {{ $representative->user->name }}</h1>
    <p><strong>Identification:</strong> {{ $representative->identification }}</p>
    <p><strong>Phone:</strong> {{ $representative->phone }}</p>

    <h2>Requests</h2>
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
            @foreach($representative->requests as $request)
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

    <h2>Calendar</h2>
    <div id="calendar"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [
                @foreach($representative->requests as $request)
                {
                    title: '{{ $request->request_type }} ({{ $request->visitor_count }} Visitors)',
                    start: '{{ $request->requested_date }}',
                },
                @endforeach
            ]
        });
        calendar.render();
    });
</script>
@endsection
