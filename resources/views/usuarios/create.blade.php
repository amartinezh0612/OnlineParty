@extends('layouts.admin')
@section('contenido') 
<html>
    <head>
        <title></title>
        <script>
            // Example starter JavaScript for disabling form submissions if there are
            // invalid fields
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array
                        .prototype
                        .filter
                        .call(forms, function (form) {
                            form.addEventListener('submit', function (event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form
                                    .classList
                                    .add('was-validated');
                            }, false);
                        });
                }, false);
            })();
        </script>
        <style>
            .btnatras {
                color: red;
            }
        </style>
        <div class="app-main__inner col">
            <div class="app-page-title">
                <div class="page-title-wrapper ">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-users icon-gradient bg-arielle-smile"></i>
                        </div>
                        <div>USUARIOS
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
                    <div>
                        <!-- Obtengo la sesión actual del usuario -->
                        {{ $message=Session::get('message') }}
                        <!-- Muestro el mensaje de validación -->
                        @include('alerts.request')
                    </div>
                    <form
                        class="needs-validation"
                        name="validacion"
                        novalidate="novalidate"
                        method="POST"
                        action="{{route('usuarios.store')}}">
                        @csrf
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Paquetes</label>
                                            <select class="form-control" name="nombre" id="paquetes" required
                                            onchange ="CostoPaquete()">
                                            <option value="">Seleccione Paquete</option>
                                            @foreach($paquetes as $paquetes)
                                            <option value="{{$paquetes->id_paquete}}"
                                                costo_paquete="{{$paquetes->costo_paquete}}">
                                                {{$paquetes->nombre}}
                                            </option>
                                            @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Costo</label>
                                            <input  type="" name="costo_paquete" min="1" id="costo_paquete"
                                            class="form-control" value="0" require readonly>
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Documento</label>
                                            <input
                                            type="number"
                                            class="form-control"
                                            id="validationTooltip04"
                                            placeholder="Ingrese Documento"
                                            name="documento"
                                            min="1"
                                            required="required">
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Nombre Completo</label>
                                            <input
                                            type="text"
                                            class="form-control"
                                            id="validationTooltip04"
                                            placeholder="Ingrese Nombre"
                                            name="nombre_completo"
                                            required="required">
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltipUsername">Correo Electrónico</label>
                                            <div class="input-group">
                                                <input
                                                type="text"
                                                class="form-control has-feedback-left"
                                                id="validationTooltipUsername"
                                                placeholder="Ingrese Correo"
                                                data-validate-linked="email"
                                                aria-describedby="validationTooltipUsernamePrepend"
                                                name="correo_electronico"
                                                required="required">
                                                <div class="invalid-feedback">
                                                    Campo Obligatorio
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Teléfono</label>
                                            <input
                                            type="number"
                                            class="form-control"
                                            id="telefono"
                                            min="1"
                                            placeholder="Ingrese Teléfono"
                                            name="telefono"
                                            required="required">
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Ciudad y Pais de Contacto</label>
                                            <input
                                            type="text"
                                            class="form-control"
                                            id="validationTooltip04"
                                            placeholder="Ingrese Ciudad"
                                            name="ciudad"
                                            required="required">
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Celebracion</label>
                                            <select class="form-control" name="motivo_celebracion" id="motivo_celebracion" required="required">
                                                <option value="">Seleccione</option>
                                                <option>Cumpleaños</option>
                                                <option>Graduación</option>
                                                <option>Compromiso Boda</option>
                                                <option>Matrimonio</option>
                                                <option>Baby Shower</option>
                                                <option>Revelación</option>
                                                <option>Otro</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip05">Fecha y Hora del Evento</label>
                                            <fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="">
                                                            <input
                                                            type="datetime-local"
                                                            class="form-control has-feedback-left"
                                                            id="single_cal3"
                                                            aria-describedby="inputSuccess2Status3"
                                                            name="fecha_evento"
                                                            required="required">
                                                            <div class="invalid-feedback">
                                                                Campo Obligatorio
                                                            </div>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status3" class="sr-only"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip05">Fecha Fin Evento</label>
                                            <fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="">
                                                            <input
                                                            type="datetime-local"
                                                            class="form-control has-feedback-left"
                                                            id="single_cal3"
                                                            aria-describedby="inputSuccess2Status3"
                                                            name="fecha_fin_evento"
                                                            required="required">
                                                            <div class="invalid-feedback">
                                                                Campo Obligatorio
                                                            </div>
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status3" class="sr-only"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Numero Invitados</label>
                                            <input
                                            type="number"
                                            class="form-control"
                                            id="input"
                                            min="1"
                                            placeholder="Ingese Invitados"
                                            name="numero_invitado"
                                            required="required">
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Edades</label>
                                            <select type="text" class="form-control" name="rango_edad_inv" id="rango_edad_inv" required="required">
                                                <option value="">Seleccione el Rango</option>
                                                <option>1 a 10</option>
                                                <option>10 a 30</option>
                                                <option>30 a 60</option>
                                                <option>Más de 60</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Duracion Evento</label>
                                            <select class="form-control" name="duracion" id="duracion" required="required">
                                                <option value="">Seleccione el Estado</option>
                                                <option>60 Min</option>
                                                <option>90 Min</option>
                                                <option>120 Min</option>
                                                <option>180 Min</option>
                                                <option>Mas de 180 Min</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Comunicado</label>
                                            <select
                                                class="form-control"
                                                name="comunicado"
                                                id="comunicado"
                                                required="required">
                                                <option value="">Seleccione</option>
                                                <option>Redes Sociales (rrss)</option>
                                                <option>Referido</option>
                                                <option>Radio</option>
                                                <option>TV</option>
                                                <option>Otro</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                                    <label for="validationTooltip04">Nombre del Anfitrion</label>
                                                    <input  
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Ingrese Anfitrión"
                                                    name="nombre_anfitrion"
                                                    id="nombre_anfitrion">
                                                </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                                    <label for="validationTooltip04">Edad del Anfitrion</label>
                                                    <input  
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Ingrese Edad"
                                                    name="edad_anfitrion"
                                                    id="edad_anfitrion">
                                                </div>
                                                </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Nombre Asesor</label>
                                            <select class="form-control" name="nombre_asesor" id="nombre_asesor" required="required">
                                                <option value="">Seleccione el Estado</option>
                                                <option>Luz Mary Huertas</option>
                                                <option>Hailin Llanes</option>
                                                <option>Andres Sanchez</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-12"  >
                                        <div class="form-group">
                                            <div class="position-relative form-group">
                                                <label for="validationTooltip04" class="">Observaciones</label>
                                                <textarea type="text" id="observacion" name="observacion" class="form-control" required="required"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" align="right">
                                    <div class="form-group">
                                        <button type="submit" class="mb-2 mr-2 btn btn-success" onclick="caracteres()">Guardar</button>
                                        <a href="{{route('usuarios.index')}}">Volver a la lista</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    </body>
    
</html>
@stop 
@section('script')
<script>

    function CostoPaquete()
    {
        let costo_paquete= $("#paquetes option:selected").attr("costo_paquete");
        $("#costo_paquete").val(costo_paquete);
    }

    
</script>

@endsection