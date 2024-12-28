<?php

namespace App\Http\Controllers;

use App\Mail\VisitConfirmation;
use App\Models\Calendar;
use App\Models\Visit;
use App\Models\VisitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VisitRequestController extends Controller
{


    public function index()
    {
        // Obtener solicitudes con relaciones necesarias
        $visitRequests = VisitRequest::with(['representative.user'])->get();

        return view('visits.index', compact('visitRequests'));
    }
    /**
     * Actualiza el estado de una solicitud de visita.
     */
    public function updateStatus(Request $request, $id)
    {
        $visitRequest = VisitRequest::findOrFail($id);

        // Guardar el estado anterior antes de actualizarlo
        $previousStatus = $visitRequest->status;

        // Actualizar el estado
        $visitRequest->status = $request->input('status');
        $visitRequest->save();

        // Crear la visita si el estado cambia a "approved"
        if ($visitRequest->status === 'approved') {
            // Obtener la fecha de la visita desde la tabla 'calendar'
            $calendarEntry = $visitRequest->calendar;

            if (!$calendarEntry) {
                return redirect()->route('visitRequests.index')->withErrors('No se pudo encontrar la fecha de la visita en el calendario.');
            }

            // Crear la entrada en la tabla "visits"
            $visit = new Visit();
            $visit->visit_request_id = $visitRequest->id;
            $visit->visitor_count = $visitRequest->visitor_count;

            // Generar un código único basado en el correo del usuario y un número aleatorio
            $uniqueCode = hash('crc32', $visitRequest->email . rand(1000, 9999));

            $visit->unique_identifier = $uniqueCode;
            $visit->save();

            // Enviar el correo con el QR dinámico y detalles de la visita
            $this->sendVisitNotification($visit, $visitRequest, $calendarEntry);
        }

        return redirect()->route('visitRequests.index')->with('success', 'El estado de la solicitud de visita ha sido actualizado.');
    }

    /**
     * Envía una notificación por correo electrónico.
     */
    protected function sendVisitNotification(Visit $visit, VisitRequest $visitRequest, Calendar $calendarEntry)
{
    $representative = $visitRequest->representative;
    $user = $representative->user;

    $details = [
        'user_name' => $user->name,
        'representative_name' => $representative->user->name ?? 'No especificado',
        'representative_id' => $representative->identification ?? 'No disponible',
        'representative_phone' => $representative->phone ?? 'No disponible',
        'request_type' => $visitRequest->request_type ?? 'No especificado',
        'request_reason' => $visitRequest->request_reason ?? 'No especificado',
        'scheduled_date' => $calendarEntry->start, // Fecha programada desde la tabla "calendar"
        'visitor_count' => $visitRequest->visitor_count ?? 0,
        'visit_identifier' => $visit->unique_identifier,
    ];

    // Generar el contenido del QR y guardarlo como archivo temporal
    $qrContent = "Unique Code: {$visit->unique_identifier}";
    $filePath = storage_path('app/temp_qr_' . $visit->id . '.png');
    QrCode::format('png')->size(800)->margin(12)->generate($qrContent, $filePath);

    // Enviar el correo con los detalles y el QR adjunto
    Mail::to($user->email)->send(new VisitConfirmation($details, $filePath));

    // Opcional: Eliminar el archivo temporal después del envío
    unlink($filePath);
}

}
