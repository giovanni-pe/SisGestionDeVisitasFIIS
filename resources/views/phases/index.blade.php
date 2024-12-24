@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Listado de Fases</h1>
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
                        <h3 class="card-title"><b>Fases Registradas</b></h3>
                        <div class="card-tools">
                            <a href="{{ url('/phases/create') }}" class="btn btn-primary"><i class="bi bi-file-plus"></i>Agregar nueva Fase</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Proceso</th>
                                    <th>Nombre</th>
                                    <th>Orden</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($phases as $phase)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $phase->process->nombre }}</td>
                                        <td>{{ $phase->nombre }}</td>
                                        <td>{{ $phase->orden }}</td>
                                        <td>{{ $phase->descripcion }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('phases.edit', $phase->id) }}" class="btn btn-success"><i class="bi bi-pencil"></i> Editar</a>
                                                <form action="{{ route('phases.destroy', $phase->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta fase?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</button>
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
