@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-lefr: 20px">
        <h1>Datos del usuario</h1>
        <br>

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Revise  los datos </b></h3>
                    </div>

                    <div class="card-body">
                        
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">Nombres</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $usuario->name }}" required autocomplete="name" autofocus disabled>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $usuario->email }}" required disabled>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">Fecha de ingreso</label>

                                <div class="col-md-6">
                                    <input id="date" type="date"
                                        class="form-control " value="{{ $usuario->fecha_ingreso }}" disabled>
                                        
                                </div>
                            </div>

                          

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                   <a href="{{ url('usuarios') }}" class="btn btn-secondary">Cancelar</a>
                                    
                                </div>
                            </div>
              
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
