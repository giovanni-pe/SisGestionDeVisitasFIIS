@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Detalles de la Fase: {{ $phase->nombre }}</h1>
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Información de la Fase</b></h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="process">Proceso</label>
                                    <input type="text" value="{{ $phase->process->nombre }}" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre de la Fase</label>
                                    <input type="text" value="{{ $phase->nombre }}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="orden">Orden</label>
                                    <input type="text" value="{{ $phase->orden }}" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" rows="5" disabled>{{ $phase->descripcion }}</textarea>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group">
                            <a href="{{ url('phases') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
