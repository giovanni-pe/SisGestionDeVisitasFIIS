<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Calendar;
use App\Models\VisitorRepresentative;
use App\Models\VisitRequest;
class AdminController extends Controller
{
  public function index() {
    $ministerios=VisitRequest::count();
    $miembros=VisitorRepresentative::all();
    $usuarios=User::all();
    $asistencias=Calendar::all();
    return  view('index',compact("ministerios",'miembros','usuarios','asistencias'));
  }
}
