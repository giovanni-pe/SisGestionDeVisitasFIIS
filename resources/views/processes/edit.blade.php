@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Visitor Representative: {{ $representative->user->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('visitor_representatives.update', $representative->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="user_id">Select Existing User (Optional)</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">-- Select a User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($user->id == $representative->user_id) selected @endif>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <hr>
        <h4>Or Update the Current User</h4>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $representative->user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $representative->user->email }}">
        </div>

        <div class="form-group">
            <label for="identification">Identification</label>
            <input type="text" name="identification" id="identification" class="form-control" value="{{ $representative->identification }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $representative->phone }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('visitor_representatives.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
