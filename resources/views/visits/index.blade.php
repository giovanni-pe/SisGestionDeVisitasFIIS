@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Solicitudes De Visita</h1>
        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    title: 'Buen trabajo!',
                    icon: 'success',
                    text: "{{ $message }}",
                })
            </script>
        @endif

        <div class="card-body">
            <table class="table table-striped table-bordered table-sm" id="example1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha Solicitada</th>
                        <th>Razón</th>
                        <th>Representante</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Notificar</th>
                     
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitRequests as $request)
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->requested_date }}</td>
                            <td>{{ $request->request_reason }}</td>
                            <td>{{ $request->representative->user->name }}</td>
                            <td>{{ $request->representative->user->email }}</td>
                            <td>
                                @if ($request->status === 'pending')
                                    <span class="badge bg-warning">Pendiente</span>
                                @elseif ($request->status === 'approved')
                                    <span class="badge bg-success">Aprobado</span>
                                @elseif ($request->status === 'rejected')
                                    <span class="badge bg-secondary">Rechazado</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('visitRequests.updateStatus', $request->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm mb-2">
                        
                                        <option value="pending" {{ $request->status === 'pending' ? 'selected' : '' }}>
                                            Pendiente</option>
                                          
                                        <option value="approved" {{ $request->status === 'approved' ? 'selected' : '' }}>
                                           Aprobado</option>
                                        <option value="rejected" {{ $request->status === 'rejected' ? 'selected' : '' }}>
                                           Rechazado</option>
                                    </select>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="notify_email"
                                            id="notify_email_{{ $request->id }}">
                                        <label class="form-check-label" for="notify_email_{{ $request->id }}">
                                            <i class="bi bi-envelope"></i> Email
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="notify_whatsapp"
                                            id="notify_whatsapp_{{ $request->id }}">
                                        <label class="form-check-label" for="notify_whatsapp_{{ $request->id }}">
                                            <i class="bi bi-whatsapp"></i> WhatsApp
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
