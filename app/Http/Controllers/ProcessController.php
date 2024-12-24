<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los procesos y ordenarlos por ID de manera descendente
        $processes = Process::all()->sortByDesc('id');
        return view('processes.index', ['processes' => $processes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar la vista de creación de proceso
        return view('processes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los campos requeridos
        $request->validate([
            "nombre" => 'required',
            "fecha_inicio" => 'required|date',
        ]);

        // Crear un nuevo proceso y guardar los datos
        $process = new Process();
        $process->nombre = $request->input("nombre");
        $process->fecha_inicio = $request->input("fecha_inicio");
        $process->fecha_fin = $request->input("fecha_fin");
        $process->descripcion = $request->input("descripcion");
        $process->save();

        // Redirigir a la lista de procesos con un mensaje de éxito
        return redirect('/processes')->with('mensaje', 'Proceso creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar el proceso especificado por ID
        $process = Process::findOrFail($id);
        return view('processes.show', compact('process'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {
        // Mostrar la vista de edición de un proceso específico
        return view('processes.edit', compact('process'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Process $process)
    {
        // Validar los campos requeridos
        $request->validate([
            "nombre" => 'required',
            "fecha_inicio" => 'required|date',
        ]);

        // Actualizar los datos del proceso con los nuevos valores
        $process->nombre = $request->input("nombre");
        $process->fecha_inicio = $request->input("fecha_inicio");
        $process->fecha_fin = $request->input("fecha_fin");
        $process->descripcion = $request->input("descripcion");
        $process->update();

        // Redirigir a la lista de procesos con un mensaje de éxito
        return redirect()->route('processes.index')->with('mensaje', 'Proceso actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        // Eliminar el proceso y redirigir con un mensaje
        return $process->delete() ?
            redirect()->route("processes.index")->with('mensaje', 'Proceso eliminado con éxito') :
            redirect()->route("processes.index")->with('mensaje', 'No se pudo eliminar el proceso');
    }
}
