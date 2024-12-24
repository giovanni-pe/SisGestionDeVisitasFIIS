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

    <form action="{{ route('visitor_representatives.store') }}" method="POST" id="representativeForm">
        @csrf

        <div class="form-group">
            <label for="user_id">Select Existing User (Optional)</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">-- Select a User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}">
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <hr>
        <h4>Or Create a New User</h4>
        <a href="{{ route('register') }}" class="btn btn-link">Register New User</a>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userDropdown = document.getElementById('user_id');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');

        userDropdown.addEventListener('change', function() {
            const selectedOption = userDropdown.options[userDropdown.selectedIndex];
            const selectedName = selectedOption.getAttribute('data-name');
            const selectedEmail = selectedOption.getAttribute('data-email');

            if (selectedName && selectedEmail) {
                nameInput.value = selectedName;
                emailInput.value = selectedEmail;
                nameInput.disabled = true;
                emailInput.disabled = true;
            } else {
                nameInput.value = '';
                emailInput.value = '';
                nameInput.disabled = false;
                emailInput.disabled = false;
            }
        });
    });
</script>
@endsection
