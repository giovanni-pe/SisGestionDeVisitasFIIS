@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Crear una nueva Fase</h1>
        <br>

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Llene los datos</b></h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('/phases') }}" method="POST" class='was-validate'>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="process_id">Proceso<b>*</b></label>
                                        <select name="process_id" class="form-control" required>
                                            <option value="">Seleccione un proceso</option>
                                            @foreach ($processes as $process)
                                                <option value="{{ $process->id }}" {{ old('process_id') == $process->id ? 'selected' : '' }}>
                                                    {{ $process->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('process_id')
                                            <small style="color:red;">*Este campo es requerido</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre de la Fase<b>*</b></label>
                                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" required>
                                        @error('nombre')
                                            <small style="color:red;">*Este campo es requerido</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="orden">Orden<b>*</b></label>
                                        <input type="number" name="orden" value="{{ old('orden') }}" class="form-control" required>
                                        @error('orden')
                                            <small style="color:red;">*Este campo es requerido</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea class="form-control" name="descripcion" rows="5">{{ old('descripcion') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <a href="{{ url('phases') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
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
