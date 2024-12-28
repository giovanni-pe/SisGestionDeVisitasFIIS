@extends('layouts.admin')

@section('content')
    <div class="" style="margin: 20px;">
        <div class="row">
            <!-- Visitas Atendidas -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $visitasAtendidas }}</h3>
                        <p>Visitas Atendidas</p>
                    </div>
                    <div class="icon mt-5">
                        <i class='bi bi-building-add'></i>
                    </div>
                    <a href="{{ route('visitor_representatives.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Solicitudes Totales -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $solicitudes }}</h3>
                        <p>Solicitudes Totales</p>
                    </div>
                    <div class="icon mt-5">
                        <i class="bi bi-people"></i>
                    </div>
                    <a href="{{ url('visit-requests') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Usuarios Registrados -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $usuarios }}</h3>
                        <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon mt-5">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <a href="{{ url('usuarios') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Visitas Semanales -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $visitasSemanales }}</h3>
                        <p>Visitas Culminadas Última Semana</p>
                    </div>
                    <div class="icon mt-5">
                        <i class="bi bi-calendar2-week"></i>
                    </div>
                    <a href="{{ url('visits/completed') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
