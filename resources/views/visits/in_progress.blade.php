@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Visitas</h1>
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
                        <h3 class="card-title"><b>Visitas en Proceso</b></h3>
                        <div class="card-tools">
                            <a href="{{ url('/visits/scan') }}" class="btn btn-primary"><i
                                    class="bi bi-file-plus"></i> QR Scaner</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm" id="example1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Visitante</th>
                                    <th>Representante</th>
                                    <th>Fecha de Entrada</th>
                                    <th>Progreso</th>
                                    <th>Cantidad de Visitantes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitsWithProgress as $data)
                                    @php
                                        $visit = $data['visit'];
                                        $progress = $data['progress'];
                                    @endphp
                                    <tr>
                                        <td>{{ $visit->id }}</td>
                                        <td>{{ $visit->visitRequest->representative->user->name ?? 'No especificado' }}</td>
                                        <td>{{ $visit->visitRequest->representative->user->email ?? 'No especificado' }}</td>
                                        <td>{{ $visit->check_in_time ?? 'No registrado' }}</td>
                                        <td>
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                                    {{ $progress }}%
                                                </div>
                                            </div>
                                            
                                        </td>
                                        <td>{{ $visit->visitor_count?? 'No registrado' }}</td>
                                       
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
                                "pageLength": 5,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando START a END de TOTAL",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 usuarios",
                                    "infoFiltered": "(Filtrado de MAX total )",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar MENU ",
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
