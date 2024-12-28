@extends('layouts.admin')

@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Edit Representative: {{ $representative->user->name }}</h1>
        <br>

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><b>Review Details</b></h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('visitor_representatives.update', $representative->id) }}" method="POST" class='was-validate'>
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row">
                                <div class="col-md-12 align-items-center">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="name">Name<b>*</b></label>
                                                <input type="text" name="name" value="{{ $representative->user->name }}" class="form-control required" required>
                                                @error('name')
                                                    <small style="color:red;">*This field is required</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Email<b>*</b></label>
                                                <input type="email" name="email" value="{{ $representative->user->email }}" class="form-control required" required>
                                                @error('email')
                                                    <small style="color:red;">*This field is required</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="identification">Identification</label>
                                                <input type="text" name="identification" value="{{ $representative->identification }}" class="form-control" required>
                                                @error('identification')
                                                    <small style="color:red;">*This field is required</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" name="phone" value="{{ $representative->phone }}" class="form-control" required>
                                                @error('phone')
                                                    <small style="color:red;">*This field is required</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <a href="{{ route('visitor_representatives.index') }}" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
