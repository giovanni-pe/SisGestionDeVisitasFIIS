@extends('layouts.admin')
@section('content')
    <div class="content" style="margin-lefr: 20px">
        <h1>Actuazacion  datos del miembro</h1>
        <br>

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><b>Llene los datos </b></h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('/miembros',$miembro->id) }}" method="post" class='was-validate'
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row">
                                <div class="col-md-9 align-items-center">
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nombre">Nombres y apellidos<b>*</b></label>
                                                <input type="text" value="{{ $miembro->nombre_apellido }}" name="nombre_apellido" class="form-control required"
                                                    required>
                                                @error('nombre_apellido')
                                                    <small style="color:red;">*Este campo es requerido</small>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text"name='email' class="form-control"  value="{{ $miembro->email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="telefono">Telefono</label>
                                            <input type="number" name="telefono" class="form-control"  value="{{ $miembro->telefono }}"required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control"  value="{{ $miembro->fecha_nacimiento }}"required>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Genero</label>
                                                <select name="genero" id="" class="form-control">
                                                    @if ($miembro->genero == 'masculino')
                                                    <option value="masculino">masculino</option>
                                                    <option value="femenino">femenino</option>
                                                @else
                                                    <option value="femenino">femenino</option>
                                                    <option value="masculino">masculino</option>
                                                @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Ministerio<b>*</b></label>
                                                <input type="text" name="ministerio" class="form-control"  value="{{ $miembro->ministerio }}"required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Direccion<b>*</b></label>
                                            <input type="text" name="direccion" class="form-control"  value="{{ $miembro->direccion }}" required>
                                        </div>

                                    </div>


                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fotografia</label>
                                        <input type="file" name="fotografia" id='file'class="form-control">
                                    </div>
                                    <br>
                                    <center>
                                        <output id="list"> <center><img src="{{ $miembro->fotografia?asset('storage') . '/' . $miembro->fotografia:( $miembro->genero == 'masculino'?url('images/varon.png'):url('images/mujer.png'))  }}"
                                            width="150px" alt="fotografia"></center></output>
                                    </center>
                                    <script>
                                        function archivo(evt) {
                                            var files = evt.target.files;
                                            //obtenemos la imagen del campo "file".
                                            for (var i = 0, f; f = files[i]; i++) {
                                                //solo admitimos imagenes.
                                                if (!f.type.match('image.*')) {
                                                    continue;
                                                }
                                                var reader = new FileReader();
                                                reader.onload = (function(theFile) {
                                                    return function(e) {
                                                        //insertamos la imagen
                                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e
                                                            .target.result, '"width="90%" title="', escape(theFile.name), '"/>'
                                                        ].join('');
                                                    };
                                                })(f);
                                                reader.readAsDataURL(f);
                                            }

                                        }
                                        document.getElementById('file').addEventListener('change', archivo, false);
                                    </script>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <a href="{{ url('miembros') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
