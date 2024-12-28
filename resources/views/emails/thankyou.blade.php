<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por su visita</title>
</head>
<body>
    <h1>Gracias por visitarnos</h1>
    <p>Estimado {{ $details['name'] }},</p>
    <p>Le agradecemos por su visita el día {{ $details['visit_date'] }}.</p>
    <p>Detalles de la visita:</p>
    <ul>
        <li>Cantidad de visitantes: {{ $details['visitor_count'] }}</li>
    </ul>
    <p>Esperamos verle nuevamente pronto.</p>
    <p>Atentamente,</p>
    <p>Facultad de Ingeniería en Informática y Sistemas (FIIS)<br>UNAS</p>
</body>
</html>
