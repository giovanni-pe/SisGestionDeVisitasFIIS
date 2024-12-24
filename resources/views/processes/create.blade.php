@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Create a New Visitor Representative</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('visitor_representatives.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">Select Existing User (Optional)</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">-- Select a User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <hr>
        <h4>Or Create a New User</h4>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="identification">Identification</label>
            <input type="text" name="identification" id="identification" class="form-control" value="{{ old('identification') }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('visitor_representatives.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
