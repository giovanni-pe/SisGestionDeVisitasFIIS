@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Listado de miembors</h1>
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
                        <h3 class="card-title"><b>Miembros Registrados</b></h3>
                        <div class="card-tools">
                            <a href="{{ url('/miembros/create') }}" class="btn btn-primary"><i
                                    class="bi bi-file-plus"></i>Agregar nuevo miembro</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm" id="example1">
                            <thead>
                                <tr>
                                    <th>
                                        Nro
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Telefono
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                    <th>
                                        Agregado
                                    </th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 1;
                                ?>
                                @foreach ($miembros as $miembro)
                                    <tr>
                                        <td><?php echo $contador++; ?></td>
                                        <td>{{ $miembro->nombre_apellido }}</td>
                                        <td>{{ $miembro->telefono }}</td>
                                        <td>{{ $miembro->email }}</td>
                                        <td style="text-align:center;">{{ $miembro->estado }}
                                        <button class="btn btn-success btn-sm" style="border-radius:20px"> Activo</button>
                                        </td>


                                        <td>{{ $miembro->fecha_ingreso }}</td>
                                        <td>
                                            <center>
                                                <div class="btn-group" role="group" aria-label="basic example">
                                                    <a href="{{ url('miembros', $miembro->id) }}" type="button"
                                                        class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                    <a href='{{ route('miembros.edit', $miembro->id) }}' type="button"
                                                        class="btn btn-success"><i class="bi bi-pencil"></i></a>


                                                    <form action="{{ url('miembros', $miembro->id) }}" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" onclick="return confirm('estas seguro de eliminar este regitro?')" class="btn btn-danger"> <i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </center>
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
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando START a END de TOTAL Miembros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Miembros",
                    "infoFiltered": "(Filtrado de MAX total Miembros)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar MENU Miembros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [{
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons: [{
                            text: 'Copiar',
                            extend: 'copy',
                        }, {
                            extend: 'pdf'
                        }, {
                            extend: 'csv'
                        }, {
                            extend: 'excel'
                        }, {
                            text: 'Imprimir',
                            extend: 'print'
                        }]
                    },
                    {
                        extend: 'colvis',
                        text: 'Visor de columnas',
                        collectionLayout: 'fixed three-column'
                    }
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
