@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-lefr: 20px">
        <h1>Datos de miembro Registrado</h1>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos registrados</b></h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('/miembros') }}" method="POST" class='was-validate'
                            enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-9 align-items-center">
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nombre">Nombres y apellidos</label>
                                                <input type="text" name="nombre_apellido"
                                                    value="{{ $miembro->nombre_apellido }}" class="form-control required"
                                                    disabled>
                                                @error('nombre_apellido')
                                                    <small style="color:red;">*Este campo es requerido</small>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text"name='email' class="form-control"
                                                    value="{{ $miembro->email }}"disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="telefono">Telefono</label>
                                            <input type="number" name="telefono" class="form-control"
                                                value="{{ $miembro->telefono }}"disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control"
                                                value="{{ $miembro->fecha_nacimiento }}"disabled>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Genero</label>
                                                <select name="genero" id="" class="form-control" disabled>
                                                    @if ($miembro->genero == 'masculino')
                                                        <option value="masculino">masculino</option>
                                                        <option value="femenino">femenino</option>
                                                    @else
                                                        <option value="femenino">femenino</option>
                                                        <option value="masculino">masculino</option>
                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Ministerio</label>
                                                <input type="text" name="ministerio" class="form-control"
                                                    value="{{ $miembro->ministerio }}"disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Direccion</label>
                                            <input type="text" name="direccion" class="form-control"
                                                value="{{ $miembro->direccion }}"disabled>
                                        </div>

                                    </div>


                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fotografia</label>
                                    </div>
                                    <center><img src="{{ $miembro->fotografia?asset('storage') . '/' . $miembro->fotografia:( $miembro->genero == 'masculino'?url('images/varon.png'):url('images/mujer.png'))  }}"
                                        width="150px" alt="fotografia"></center>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <a href="{{ url('/miembros') }}" class="btn btn-secondary">Volver</a>
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
