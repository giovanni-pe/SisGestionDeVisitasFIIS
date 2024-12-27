import { Html5Qrcode } from "html5-qrcode";

export default class QrScanner {
    constructor(elementId, onSuccessCallback, onErrorCallback) {
        this.elementId = elementId;
        this.onSuccessCallback = onSuccessCallback;
        this.onErrorCallback = onErrorCallback;
        this.html5QrCode = new Html5Qrcode(elementId);
    }

    start() {
        this.html5QrCode
            .start(
                { facingMode: "environment" }, // Cámara trasera
                {
                    fps: 10, // Cuadros por segundo
                    qrbox: { width: 250, height: 250 } // Tamaño del cuadro de escaneo
                },
                this.onSuccessCallback,
                this.onErrorCallback
            )
            .catch((err) => {
                console.error("Error al iniciar el lector QR:", err);
            });
    }

    stop() {
        this.html5QrCode.stop().then(() => {
            console.log("Lector QR detenido.");
        });
    }
}
