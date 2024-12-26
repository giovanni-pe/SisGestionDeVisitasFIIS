<?php

namespace App\Http\Controllers;

use App\Models\VisitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VisitRequestController extends Controller
{
    /**
     * Muestra todas las solicitudes de visita en el dashboard.
     */
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
        // Validar el estado recibido
        $request->validate([
            'status' => 'required|string|in:pending,confirmed,completed',
            'notify_email' => 'nullable|boolean',
            'notify_whatsapp' => 'nullable|boolean',
        ]);

        // Buscar la solicitud y actualizar el estado
        $visitRequest = VisitRequest::findOrFail($id);
        $visitRequest->status = $request->status;
        $visitRequest->save();

        // Enviar notificaciones si están seleccionadas
        if ($request->notify_email) {
            $this->sendEmailNotification($visitRequest);
        }

        if ($request->notify_whatsapp) {
            $this->sendWhatsAppNotification($visitRequest);
        }

        return redirect()->route('visitRequests.index')->with('success', 'El estado de la solicitud ha sido actualizado.');
    }

    /**
     * Envía una notificación por correo electrónico.
     */
    protected function sendEmailNotification($visitRequest)
    {
        $user = $visitRequest->representative->user;

        if ($user && $user->email) {
            $details = [
                'title' => 'Actualización de Estado de Solicitud',
                'body' => "La solicitud de visita con ID {$visitRequest->id} ha cambiado a estado: {$visitRequest->status}.",
            ];

           // Mail::to($user->email)->send(new \App\Mail\VisitRequestStatusMail($details));
        }
    }

    /**
     * Envía una notificación por WhatsApp.
     */
    protected function sendWhatsAppNotification($visitRequest)
    {
        $representative = $visitRequest->representative;

        if ($representative && $representative->phone) {
            // Aquí podrías usar un servicio como Twilio para enviar mensajes de WhatsApp.
            // Ejemplo de envío (lógica ficticia):
            // Twilio::sendWhatsApp($representative->phone, "La solicitud de visita con ID {$visitRequest->id} ha cambiado a estado: {$visitRequest->status}.");
        }
    }
}
