<?php 
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function getUnavailableDates()
    {
        $dates = Calendar::select('start', 'end')->get();

        return response()->json([
            'message' => 'Fechas ocupadas obtenidas.',
            'data' => $dates,
        ]);
    }
}
