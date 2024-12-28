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
                        <h3 class="card-title"><b>Escanea el Código QR</b></h3>
                        <div class="card-tools">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="cameraSwitch">
                                    <label class="custom-control-label" for="cameraSwitch">Cámara apagada</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>Por favor, escanee el código QR de la visita utilizando la cámara.</p>

                        <!-- Mostrar mensajes de error o éxito -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Contenedor del lector QR con diseño futurista -->
                        <div id="reader-container">
                            <div id="reader"></div>
                            <div class="scan-overlay">
                                <div class="scan-line"></div>
                            </div>
                        </div>

                        <form id="qr-form" method="POST" action="{{ route('visits.process') }}">
                            @csrf
                            <input type="hidden" name="unique_identifier" id="unique_identifier">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para cargar html5-qrcode -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        let html5QrCode;
        const cameraSwitch = document.getElementById("cameraSwitch");
        const cameraLabel = document.querySelector('label[for="cameraSwitch"]');
        const reader = document.getElementById("reader-container");

        cameraSwitch.addEventListener("change", async () => {
            if (cameraSwitch.checked) {
                cameraLabel.textContent = "Cámara encendida";
                reader.style.display = "block";

                try {
                    html5QrCode = new Html5Qrcode("reader");
                    await html5QrCode.start(
                        { facingMode: "environment" }, // Usar cámara trasera si está disponible
                        {
                            fps: 10, // Cuadros por segundo
                            qrbox: { width: 250, height: 250 }, // Tamaño del cuadro QR
                        },
                        qrCodeSuccessCallback,
                        qrCodeErrorCallback
                    );
                } catch (err) {
                    console.error("Error al iniciar la cámara: ", err);
                    Swal.fire({
                        title: 'Error!',
                        icon: 'error',
                        text: 'No se pudo iniciar la cámara.',
                    });
                    cameraSwitch.checked = false;
                    cameraLabel.textContent = "Cámara apagada";
                }
            } else {
                cameraLabel.textContent = "Cámara apagada";
                reader.style.display = "none";

                if (html5QrCode) {
                    await html5QrCode.stop();
                    html5QrCode = null;
                }
            }
        });

        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            console.log(`Código QR escaneado: ${decodedText}`);
            document.getElementById('unique_identifier').value = decodedText;
            document.getElementById('qr-form').submit();
        };

        const qrCodeErrorCallback = (errorMessage) => {
            console.warn(`Error al escanear: ${errorMessage}`);
        };
    </script>

    <style>
        /* Diseño futurista para el lector QR */
        #reader-container {
            position: relative;
            width: 350px;
            height: 350px;
            margin: 30px auto;
            background: linear-gradient(135deg, #1f1f1f, #2b2b2b);
            border: 2px solid rgba(0, 255, 255, 0.6);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.5), inset 0 0 10px rgba(0, 255, 255, 0.2);
            display: none;
            overflow: hidden;
        }

        #reader {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .scan-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .scan-line {
            width: 90%;
            height: 4px;
            background: linear-gradient(90deg, rgba(0, 255, 255, 0) 0%, rgba(0, 255, 255, 1) 50%, rgba(0, 255, 255, 0) 100%);
            animation: scan-animation 2s infinite;
        }

        @keyframes scan-animation {
            0% {
                transform: translateY(-150px);
            }
            50% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(150px);
            }
        }
    </style>
@endsection
