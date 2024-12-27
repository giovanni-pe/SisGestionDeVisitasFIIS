<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\VisitRequest;
use App\Models\VisitorRepresentative;
use Illuminate\Http\Request;

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

        // Buscar la visita en base al identificador único
        $visit = Visit::with(['visitRequest.representative.user'])
            ->where('unique_identifier', $uniqueIdentifier)
            ->first();

        if (!$visit) {
            return redirect()->route('visits.scan')->withErrors('El código QR no es válido.');
        }

        // Si la visita ya está registrada como entrada
        if ($visit->status === 'checked_in') {
            return redirect()->route('visits.scan')->withErrors('Esta visita ya ha sido registrada.');
        }

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
            'status' => 'checked_in',
        ]);

        return redirect()->route('visits.scan')->with('success', 'Visita registrada exitosamente.');
    }
}
