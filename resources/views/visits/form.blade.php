@extends('layouts.admin')

@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Visitas</h1>
        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    title: 'Buen trabajo!',
                    icon: 'success',
                    text: "{{ $message }}",
                })
            </script>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Recepcion de Visita</b></h3>
                        <div class="card-tools">
                            <div class="form-group">
                                <a href="{{ url('/visits/scan') }}" class="btn btn-primary"><i
                                    class="bi bi-file-plus"></i> QR Scaner</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h1>Detalles de la Visita</h1>
                        <p><strong>Identificador de Visita:</strong> {{ $visit->unique_identifier }}</p>
                        <p><strong>Representante:</strong> {{ $representative->user->name }}</p>
                        <p><strong>Teléfono:</strong> {{ $representative->phone }}</p>
                        <p><strong>Razón de la Visita:</strong> {{ $visitRequest->request_reason }}</p>
                        <p><strong>Fecha Programada:</strong> {{ $visitRequest->requested_date }}</p>
                    
                        <h2>Completar Información</h2>
                        <form method="POST" action="{{ route('visits.complete', $visit->id) }}">
                            @csrf
                            <div>
                                <label for="visitor_count">Número de Visitantes:</label>
                                <input type="number" name="visitor_count" id="visitor_count" value="{{ old('visitor_count', $visit->visitor_count) }}" required>
                            </div>
                            <div>
                                <label for="additional_notes">Notas Adicionales:</label>
                                <textarea name="additional_notes" id="additional_notes">{{ old('additional_notes') }}</textarea>
                            </div>
                            <button type="submit">Registrar Visita</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection
