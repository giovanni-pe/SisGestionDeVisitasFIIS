@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Listado de Procesos</h1>
        @if ($message = Session::get('mensaje'))
            <script>
                Swal.fire({
                    title: 'Buen trabajo!',
                    icon: 'success',
                    text: "{{ $message }}",
                })
            </script>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Procesos Registrados</b></h3>
                        <div class="card-tools">
                            <a href="{{ url('/processes/create') }}" class="btn btn-primary"><i class="bi bi-file-plus"></i>Agregar nuevo Proceso</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del Proceso</th>
                                    <th>Descripción</th>
                                    <th>Fecha de inicio</th>
                                    <th>Fecha de fin</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($processes as $process)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $process->nombre }}</td>
                                        <td>{{ Str::limit($process->descripcion, 100) }}</td>
                                        <td>{{ $process->fecha_inicio }}</td>
                                        <td>{{ $process->fecha_fin }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('processes', $process->id) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                <a href="{{ route('processes.edit', $process) }}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                                <form action="{{ url('processes', $process) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este proceso?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
