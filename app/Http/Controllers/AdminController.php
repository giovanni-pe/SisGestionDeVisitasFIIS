<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Calendar;
use App\Models\Visit;
use App\Models\VisitorRepresentative;
use App\Models\VisitRequest;
class AdminController extends Controller
{
  public function index()
  {
      // Total de visitas atendidas
      $visitasAtendidas = Visit::where('status', 'completed')->count();
  
      // Total de solicitudes (todas las visitas)
      $solicitudes = Visit::count();
  
      // Usuarios registrados (si necesitas calcular de otra tabla)
      $usuarios = User::count();
  
      // Visitas culminadas en la última semana
      $visitasSemanales = Visit::where('status', 'completed')
          ->whereBetween('check_out_time', [now()->subDays(7), now()])
          ->count();
  
      return view('index', compact('visitasAtendidas', 'solicitudes', 'usuarios', 'visitasSemanales'));
  }
  

}
