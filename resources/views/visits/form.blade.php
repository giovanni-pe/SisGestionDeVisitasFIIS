<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar Datos de la Visita</title>
</head>
<body>
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
</body>
</html>
