@extends ('layouts.admin')
@section ('contenido')

<!DOCTYPE html>
<html>

<head>
    <title>Editar Paquetes</title>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

    </script>


    <div class="app-main__inner col">
        <div class="app-page-title">
            <div class="page-title-wrapper ">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-portfolio icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>PAQUETES
                        <div class="page-title-subheading">Sistema de Administración de Online Party
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</head>

<body>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Online Party</h5>
                <form class="needs-validation" novalidate method="POST"
                    action="{{route('paquetes.update', $paquetes->id_paquete)}}">
                    {!! method_field('PUT')!!}
                    @csrf
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Paquete</label>
                                        <input type="text" class="form-control" id="validationTooltip04"
                                            placeholder="Ingrese Paquete" name="nombre"
                                            value="{{$paquetes->nombre}}" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Descripcion</label>
                                        <input type="text" class="form-control" id="validationTooltip04"
                                            placeholder="Paquete" name="descripcion_p"
                                            value="{{$paquetes->descripcion_p}}" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                        <label for="validationTooltip04">Costo</label>
                                        <input type="number" class="form-control" id="costo_paquete"
                                            placeholder="Costo" name="costo_paquete" min="1" value="{{$paquetes->costo_paquete}}" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                               
                            </div>

                        </div>
                        <div>
                    <!-- Obtengo la sesión actual del usuario -->
                    {{ $message=Session::get('message') }}

                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                </div>
                        <div class="form-group" align="right">
                            <div class="form-group">
                                <button type="submit" class="mb-2 mr-2 btn btn-success">Guardar</button>
                                <a href="{{route('paquetes.index')}}">Volver a la lista</a>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>
@stop
