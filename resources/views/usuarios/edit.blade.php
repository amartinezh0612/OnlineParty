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
                        novalidate method="POST"
                        action="{{route('usuarios.update', $usuarios->id_usuario)}}">
                        {!!method_field('PUT')!!}
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
                                            <option {{$usuarios->id_paquete==$paquetes->id_paquete?'selected':''}}
                                            value="{{$paquetes->id_paquete}}"
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
                                            <input type="number" name="costo_paquete" min="1" id="costo_paquete"
                                            class="form-control" value="{{$paquetes->costo_paquete}}" require readonly>
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
                                            value="{{$usuarios->documento}}"
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
                                            value="{{$usuarios->nombre_completo}}"
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
                                                value="{{$usuarios->correo_electronico}}"
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
                                            id="input"
                                            min="1"
                                            placeholder="Ingese Telefono"
                                            name="telefono"
                                            value="{{$usuarios->telefono}}"
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
                                            value="{{$usuarios->ciudad}}"
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
                                                <option>{{$usuarios->motivo_celebracion}}</option>
                                                @if($usuarios->motivo_celebracion=="Cumpleaños")
                                                <option>Graduación</option>
                                                <option>Compromiso Boda</option>
                                                <option>Matrimonio</option>
                                                <option>Baby Shower</option>
                                                <option>Revelacion</option>
                                                <option>Otro</option>
                                                @elseif($usuarios->motivo_celebracion=="Graduación")
                                                <option>Cumpleaños</option>
                                                <option>Compromiso Boda</option>
                                                <option>Matrimonio</option>
                                                <option>Baby Shower</option>
                                                <option>Revelacion</option>
                                                <option>Otro</option>
                                                @elseif($usuarios->motivo_celebracion=="Compromiso Boda")
                                                <option>Cumpleaños</option>
                                                <option>Graduación</option>
                                                <option>Matrimonio</option>
                                                <option>Baby Shower</option>
                                                <option>Revelacion</option>
                                                <option>Otro</option>
                                                @elseif($usuarios->motivo_celebracion=="Matrimonio")
                                                <option>Cumpleaños</option>
                                                <option>Compromiso Boda</option>
                                                <option>Graduacion</option>
                                                <option>Baby Shower</option>
                                                <option>Revelacion</option>
                                                <option>Otro</option>
                                                @elseif($usuarios->motivo_celebracion=="Baby Shower")
                                                <option>Cumpleaños</option>
                                                <option>Compromiso Boda</option>
                                                <option>Matrimonio</option>
                                                <option>Graduación</option>
                                                <option>Revelacion</option>
                                                <option>Otro</option>
                                                @else
                                                <option>Cumpleaños</option>
                                                <option>Compromiso Boda</option>
                                                <option>Matrimonio</option>
                                                <option>Graduación</option>
                                                <option>Revelacion</option>
                                                <option>Otro</option>
                                                @endif
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
                                                            type="datetime"
                                                            class="form-control has-feedback-left"
                                                            id="fecha_evento"
                                                            aria-describedby="inputSuccess2Status3"
                                                            name="fecha_evento"
                                                            value="{{$usuarios->fecha_evento}}"
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
                                                            type="datetime"
                                                            class="form-control has-feedback-left"
                                                            id="fecha_fin_evento"
                                                            aria-describedby="inputSuccess2Status3"
                                                            name="fecha_fin_evento"
                                                            value="{{$usuarios->fecha_fin_evento}}"
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
                                            placeholder="Ingese Telefono"
                                            name="numero_invitado"
                                            value="{{$usuarios->numero_invitado}}"
                                            required="required">
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Edades</label>
                                            <select class="form-control" name="rango_edad_inv" id="rango_edad_inv" required="required">
                                                <option>{{$usuarios->rango_edad_inv}}</option>
                                                @if($usuarios->rango_edad_inv=="1 a 10")
                                                <option>10 a 30</option>
                                                <option>30 a 60</option>
                                                <option>Más de 60</option>
                                                @elseif($usuarios->rango_edad_inv=="10 a 30")
                                                <option>1 a 10</option>
                                                <option>30 a 60</option>
                                                <option>Más de 60</option>
                                                @elseif($usuarios->rango_edad_inv=="30 a 60")
                                                <option>1 a 10</option>
                                                <option>10 a 30</option>
                                                <option>Más de 60</option>
                                                @elseif($usuarios->rango_edad_inv=="Más de 60")
                                                <option>1 a 10</option>
                                                <option>10 a 30</option>
                                                <option>30 de 60</option>
                                                @else
                                                <option>1 a 10</option>
                                                <option>10 a 30</option>
                                                <option>30 de 60</option>
                                                <option>Más de 60</option>
                                                @endif
                                            </select>
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Duración Evento</label>
                                            <select class="form-control" name="duracion" id="duracion" required="required">
                                                <option>{{$usuarios->duracion}}</option>
                                                @if($usuarios->duracion=="60 Min")
                                                <option>90 Min</option>
                                                <option>120 Min</option>
                                                <option>180 Min</option>
                                                <option>Mas 180 Min</option>
                                                @elseif($usuarios->duracion=="90 Min")
                                                <option>60 Min</option>
                                                <option>120 Min</option>
                                                <option>180 Min</option>
                                                <option>Mas 180 Min</option>
                                                @elseif($usuarios->duracion=="120 Min")
                                                <option>60 Min</option>
                                                <option>90 Min</option>
                                                <option>180 Min</option>
                                                <option>Mas 180 Min</option>
                                                @elseif($usuarios->duracion=="180 Min")
                                                <option>60 Min</option>
                                                <option>90 Min</option>
                                                <option>120 Min</option>
                                                <option>Mas 180 Min</option>
                                                @elseif($usuarios->duracion=="Mas de 180 Min")
                                                <option>60 Min</option>
                                                <option>90 Min</option>
                                                <option>180 Min</option>
                                                @else
                                                <option>60 Min</option>
                                                <option>90 Min</option>
                                                <option>120 Min</option>
                                                <option>180 Min</option>
                                                <option>Mas de 180 Min</option>
                                                @endif
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
                                                <option>{{$usuarios->comunicado}}</option>
                                                @if($usuarios->comunicado=="Redes Sociales")
                                                <option>Referido</option>
                                                <option>Radio</option>
                                                <option>TV</option>
                                                <option>Otro</option>
                                                @elseif($usuarios->comunicadp=="Referido")
                                                <option>Redes Sociales</option>
                                                <option>Radio</option>
                                                <option>TV</option>
                                                <option>Otro</option>
                                                @elseif($usuarios->comunicadp=="Radio")
                                                <option>Redes Sociales</option>
                                                <option>Referido</option>
                                                <option>TV</option>
                                                <option>Otro</option>
                                                @elseif($usuarios->comunicadp=="TV")
                                                <option>Redes Sociales</option>
                                                <option>Referido</option>
                                                <option>Radio</option>
                                                <option>Otro</option>
                                                @else
                                                <option>Redes Sociales</option>
                                                <option>Referido</option>
                                                <option>Radio</option>
                                                <option>TV</option>
                                                <option>Otro</option>
                                                @endif
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
                                                    placeholder="Nombre"
                                                    name="nombre_anfitrion"
                                                    id="nombre_anfitrion"
                                                    value="{{$usuarios->nombre_anfitrion}}">
                                                </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                                    <label for="validationTooltip04">Edad del Anfitrion</label>
                                                    <input  
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Edad"
                                                    name="edad_anfitrion"
                                                    id="edad_anfitrion"
                                                    value="{{$usuarios->edad_anfitrion}}">
                                                </div>
                                                </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Nombre Asesor</label>
                                            <select class="form-control" name="nombre_asesor" id="nombre_asesor" required="required">
                                                <option>{{$usuarios->nombre_asesor}}</option>
                                                @if($usuarios->nombre_asesor=="Luz Mary Huertas")
                                                <option>Hailin Llanes</option>
                                                <option>Andres Sanchez</option>
                                                @elseif($usuarios->nombre_asesor=="Hailin Llanes")
                                                <option>Luz Mary Huertas</option>
                                                <option>Andres Sanchez</option>
                                                @else
                                                <option>Hailin Llanes</option>
                                                <option>Luz Mary Huertas</option>
                                                @endif
                                            </select>
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <div class="form-group">
                                            <div class="position-relative form-group">
                                                <label for="exampleText" class="">Observaciones</label>
                                                <input value="{{$usuarios->observacion}}" type="text" id="observacion" name="observacion" class="form-control"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" align="right">
                                    <div class="form-group">
                                        <button type="submit" class="mb-2 mr-2 btn btn-success"  >Guardar</button>
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
