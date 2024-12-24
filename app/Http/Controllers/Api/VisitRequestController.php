<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VisitorRepresentative;
use App\Models\VisitRequest;
use App\Models\Calendar;
use Illuminate\Http\Request;

class VisitRequestController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Obtener al usuario autenticado y su representante
            $user = $request->user();
            $representative = VisitorRepresentative::where('user_id', $user->id)->first();

            if (!$representative) {
                return response()->json([
                    'message' => 'No se encontró un representante asociado al usuario autenticado.',
                ], 404);
            }

            // Validar los datos de entrada
            $validatedData = $request->validate([
                'request_type' => 'required|string',
                'request_reason' => 'required|string',
                'requested_date' => 'required|date',
                'visitor_count' => 'required|integer|min:1',
                'event_type' => 'required|string',
                'title' => 'required|string',
                'start' => 'required|date_format:Y-m-d H:i:s',
                'end' => 'required|date_format:Y-m-d H:i:s|after:start',
            ]);

            // Verificar si la fecha ya está ocupada en el calendario
            $dateExists = Calendar::where('start', '<=', $validatedData['start'])
                ->where('end', '>=', $validatedData['end'])
                ->exists();

            if ($dateExists) {
                return response()->json([
                    'message' => 'La fecha seleccionada ya está ocupada en el calendario.',
                ], 400);
            }

            // Crear la solicitud de visita
            $visitRequest = VisitRequest::create([
                'representative_id' => $representative->id,
                'request_type' => $validatedData['request_type'],
                'request_reason' => $validatedData['request_reason'],
                'requested_date' => $validatedData['requested_date'],
                'visitor_count' => $validatedData['visitor_count'],
                'status' => 'pending',
            ]);

            // Crear el evento en el calendario
            $calendarEvent = Calendar::create([
                'visit_request_id' => $visitRequest->id,
                'event_type' => $validatedData['event_type'],
                'title' => $validatedData['title'],
                'start' => $validatedData['start'],
                'end' => $validatedData['end'],
            ]);

            return response()->json([
                'message' => 'Solicitud y evento creados exitosamente.',
                'visit_request' => $visitRequest,
                'calendar_event' => $calendarEvent,
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Errores de validación.',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error inesperado.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
