@extends('layouts.admin')
@section('content')
    <div class="" style="margin: 20px;">
        <div class="row">
            <div class="col-lg-3 col-6">
    
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>5</h3>
                        <p>Visitas Atendidad</p>
                    </div>
                    <div class="icon  mt-5"  >
                        <i class='bi bi-building-add' ></i>
                    </div>
                    <a href="{{ route('visitor_representatives.index') }}" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
            <div class="col-lg-3 col-6">
    
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ sizeof($miembros) }}<sup style="font-size: 20px"></sup></h3>
                        <p>Visitas Pendientes</p>
                    </div>
                    <div class="icon mt-5">
                        <i class="bi bi-people"></i>
                    </div>
                    <a href="{{ route('visitor_representatives.index') }}" class="small-box-footer">Mas infromacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
            <div class="col-lg-3 col-6">
    
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $usuarios->count() }}</h3>
                        <p>usuarios registrados</p>
                    </div>
                    <div class="icon mt-5">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <a href="{{ url('usuarios') }}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
            <div class="col-lg-3 col-6">
    
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $asistencias->count() }}</h3>
                        <p>Visitas Semanales</p>
                    </div>
                    <div class="icon mt-5">
                        <i class="bi bi-calendar2-week"></i>
                    </div>
                    <a href="{{ url('asistencias') }}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
        </div>
    </div>
@endsection
