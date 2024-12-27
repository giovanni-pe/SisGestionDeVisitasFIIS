<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escanear Código QR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        video {
            margin-top: 20px;
            max-width: 100%;
            height: auto;
        }
        #reader {
            width: 100%;
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Escanea el Código QR</h1>
    <p>Por favor, escanee el código QR de la visita utilizando la cámara.</p>

    <!-- Contenedor del lector QR -->
    <div id="reader"></div>

    <form id="qr-form" method="POST" action="{{ route('visits.process') }}">
        @csrf
        <input type="hidden" name="unique_identifier" id="unique_identifier">
    </form>

    <!-- Script para cargar html5-qrcode -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            console.log(`Código QR escaneado: ${decodedText}`);
            document.getElementById('unique_identifier').value = decodedText;
            document.getElementById('qr-form').submit();
        };

        const qrCodeErrorCallback = (errorMessage) => {
            // Opcional: Mostrar errores si lo deseas
            console.warn(`Error al escanear: ${errorMessage}`);
        };

        const html5QrCode = new Html5Qrcode("reader");

        // Iniciar el lector QR
        html5QrCode.start(
            { facingMode: "environment" }, // Intentar usar la cámara trasera si está disponible
            {
                fps: 10, // Cuadros por segundo
                qrbox: { width: 300, height: 300 }, // Tamaño del cuadro QR
            },
            qrCodeSuccessCallback,
            qrCodeErrorCallback
        ).catch(err => {
            console.error(`No se pudo iniciar el escáner: ${err}`);
        });
    </script>
</body>
</html>
