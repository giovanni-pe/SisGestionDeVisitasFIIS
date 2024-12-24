@extends('layouts.admin')

@section('template_title')
    Asistencia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ 'Reporte de asistencias' }}
                            </span>


                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box" style="height: 92px">
                                    <span class="info-box-icon bg-info">
                                        <a href="{{ url('/asistencias/pdf') }}"><i class="bi bi-printer"></i></a></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Imprimir reporte</span>
                                        <span class="info-box-number">Asistencias</span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="info-box" style="height: 92px">
                                    <span class="info-box-icon bg-warning ">
                                        <a href="{{ url('/asistencias/pdf') }}"><i class="bi bi-printer"></i></a></span>
                                    <div class="info-box-content">
                                        <form action="{{url('/asistencias/pdf_fechas') }}" method="GET">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Fecha de inicio</label>
                                                    <input type="date" name="fecha_inicio"  required=""
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Fecha de fin</label>
                                                    <input type="date" required name="fecha_fin" id=""
                                                        class="form-control">
                                                </div>
                                             
                                                <div class="col-md-4">
                                               
                                                    <button type="submit" class="btn btn-success mt-4">Generar Reporte</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
