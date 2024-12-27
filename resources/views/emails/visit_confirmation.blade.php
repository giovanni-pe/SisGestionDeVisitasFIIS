<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Visita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
            margin: 0;
        }
        h1 {
            color: #0056b3;
        }
        p, li {
            margin: 8px 0;
        }
        ul {
            padding-left: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
        }
        .details-container {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .highlight {
            color: #0056b3;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Estimado/a {{ $details['user_name'] }},</h1>
    <p>Nos complace informarle que su solicitud de visita ha sido aprobada. A continuación, encontrará los detalles de la visita:</p>
    
    <div class="details-container">
        <p><strong>Detalles de la solicitud:</strong></p>
        <ul>
            <li><strong>Representante:</strong> {{ $details['representative_name'] }}</li>
            <li><strong>Identificación:</strong> {{ $details['representative_id'] }}</li>
            <li><strong>Teléfono:</strong> {{ $details['representative_phone'] }}</li>
            <li><strong>Razón de la visita:</strong> {{ $details['request_reason'] }}</li>
            <li><strong>Fecha programada:</strong> <span class="highlight">{{ $details['scheduled_date'] }}</span></li>
            <li><strong>Número de visitantes:</strong> {{ $details['visitor_count'] }}</li>
            <li><strong>Identificador de visita:</strong> <span class="highlight">{{ $details['visit_identifier'] }}</span></li>
        </ul>
    </div>

    <p>Se adjunta un código QR que debe presentar al momento de su llegada.</p>
    
    <p>Atentamente,</p>
    <p><strong>Equipo de Gestión de Visitas</strong></p>

    <div class="footer">
        <p>Este correo es generado automáticamente. Por favor, no responda a este mensaje.</p>
    </div>
</body>
</html>
