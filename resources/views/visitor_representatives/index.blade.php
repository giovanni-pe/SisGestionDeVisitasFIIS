@extends('layouts.admin')

@section('content')
<div class="content" style="margin-left: 20px">
    <h1>Listado de Representantes de Vista</h1>

    @if ($message = Session::get('mensaje'))
        <script>
            Swal.fire({
                title: 'Buen trabajo!',
                icon: 'success',
                text: "{{ $message }}",
            });
        </script>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Representantes Registrados</b></h3>
                    <div class="card-tools">
                        <a href="{{ route('visitor_representatives.create') }}" class="btn btn-primary">
                            <i class="bi bi-file-plus"></i> Agregar nuevo Representante
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-sm" id="example1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Identification</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($representatives as $rep)
                                <tr>
                                    <td>{{ $rep->id }}</td>
                                    <td>{{ $rep->user->name }}</td>
                                    <td>{{ $rep->user->email }}</td>
                                    <td>{{ $rep->identification }}</td>
                                    <td>{{ $rep->phone }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- View Details -->
                        
                                            <!-- Edit -->
                                            <a href="{{ route('visitor_representatives.edit', $rep->id) }}" class="btn btn-success">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('visitor_representatives.destroy', $rep->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this representative?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
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
