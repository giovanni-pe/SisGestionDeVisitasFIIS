<?php

namespace App\Http\Controllers;

use App\Mail\ThankYouMail;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VisitController extends Controller
{
    /**
     * Muestra la página de escaneo del código QR.
     */
    public function scan()
    {
        return view('visits.scan');
    }

    /**
     * Procesa el código QR escaneado.
     */
    public function processQRCode(Request $request)
    {
        $uniqueIdentifier = $request->input('unique_identifier');
        $uniqueIdentifier = str_replace('Unique Code: ', '', $uniqueIdentifier);

        // Buscar la visita en base al identificador único
        $visit = Visit::with(['visitRequest.representative.user'])
            ->where('unique_identifier', $uniqueIdentifier)
            ->latest()->first();

        if (!$visit) {
            return redirect()->route('visits.scan')->withErrors('El código QR no es válido.');
        }

        // Si la visita ya está completada
        if ($visit->status === 'completed') {
            return redirect()->route('visits.scan')->withErrors('Esta visita ya ha culminado.');
        }

        // Si la visita está en progreso, registrar la salida automáticamente
        if ($visit->status === 'in_progress') {
            $visit->update([
                'check_out_time' => now(),
                'status' => 'completed',
            ]);

            

            return redirect()->route('visits.scan')->with('success', 'Salida registrada exitosamente.');
        }

        // Si la visita no ha sido registrada aún, mostrar formulario para completarla
        return view('visits.form', [
            'visit' => $visit,
            'visitRequest' => $visit->visitRequest,
            'representative' => $visit->visitRequest->representative,
        ]);
    }

    /**
     * Completa los datos de la visita y registra la entrada.
     */
    public function completeVisit(Request $request, $id)
    {
        $visit = Visit::findOrFail($id);

        // Validar los datos faltantes
        $request->validate([
            'visitor_count' => 'required|integer|min:1',
            'additional_notes' => 'nullable|string',
        ]);

        // Actualizar los datos de la visita
        $visit->update([
            'visitor_count' => $request->input('visitor_count'),
            'check_in_time' => now(),
            'status' => 'in_progress',
        ]);

        return redirect()->route('visits.scan')->with('success', 'Visita registrada exitosamente.');
    }

    /**
     * Envía un correo de agradecimiento al completar la visita.
     */
   
    public function visitsInProgress()
    {
        $visits = Visit::with(['visitRequest.representative.user', 'visitRequest.calendar'])
            ->where('status', 'in_progress')
            ->get();

        // Crear una colección con las visitas y sus progresos
        $visitsWithProgress = $visits->map(function ($visit) {
            $start = $visit->check_in_time;
            $end = $visit->visitRequest->calendar->end_time ?? null; // Fecha del calendario
            $now = now();

            if ($start && $end) {
                $totalDuration = $end->diffInSeconds($start);
                $elapsedDuration = $now->diffInSeconds($start);
                $progress = min(100, max(0, ($elapsedDuration / $totalDuration) * 100));
            } else {
                $progress = 0; // Si faltan fechas, el progreso es 0
            }

            return [
                'visit' => $visit,
                'progress' => round($progress, 2),
            ];
        });

        return view('visits.in_progress', ['visitsWithProgress' => $visitsWithProgress]);
    }
    public function visitsCompleted()
    {
        $visits = Visit::with(['visitRequest.representative.user', 'visitRequest.calendar'])
            ->where('status', 'completed')
            ->get();

        return view('visits.completed', ['visits' => $visits]);
    }
    public function visitsCancelled()
    {
        $visits = Visit::with(['visitRequest.representative.user', 'visitRequest.calendar'])
            ->where('status', 'canceled')
            ->get();

        return view('visits.cancelled', ['visits' => $visits]);
    }
}
