<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte</title>
</head>
<body>
 
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <?php foreach ($usuarios as $key => $usu) { ?>

                        <table align="center">
                            <tr>
                                <td align="center" style="font-size:15px;" width=180>
                                    <img src={{ asset('images/logo-inverse.png') }} alt="" id="imagen"   >
                                    <br>EMPRESA DE INTERNET OPERADOR CONSULTORIA COMERCIAL CH
                                    <br>NIT: 901.392.154
                                    <br>(+57)322 7144144 - (+57) 318 6045305
                                    <br>onlineparty.op2020@gmail.com
                                    
                                </td>
                            </tr>
                        </table>

                        <table align="center">
                            <tr>
                                <td width=500 align="right" style="font-size:13px;"></td>
                            </tr>
                        </table>

                        <table align="center">
                            <tr>
                                <td width=330 class="solid-black">
                                    <table style="font-size:10px;" >
                                        
                                    </table>
                                </td>
                                <td width=210>
                                    <table style="font-size:13px;" align="center" class="tabla_borde_redond">
                                        <tr>
                                            <td width=105 style="border-bottom: 1px black;">Fecha de Llamada:<br></td>
                                            <td width=105 style="border-bottom: 1px black;" align="center">{{$usu->fecha_llamada}}</td>
                                        </tr>
                                        
                                        
                                    </table>
                                </td>
                            </tr>
                        </table>
                    <section>
                        <table align="center" style="font-size:13px;">
                        <thead>
                            <tr style="font-size:12px;" bgcolor="#D8D8D8">
                                <td align="center" width=100><strong>INFORMACIÓN DEL CONTACTO</strong></td>
                                <td align="center" width=150><strong>DATOS DEL EVENTO</strong></td>
                                <td align="center" width=70><strong>PAQUETE</strong></td>
                                <td align="center" width=120><strong>DESCRIPCIÓN PAQUETE</strong></td>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="solid-black"  align=""><strong>Documento: </strong>{{$usu->documento}}<br><strong>Nombre: </strong>{{$usu->nombre_completo}}<br>
                                <strong>Correo: </strong>{{$usu->correo_electronico}}</td>
                                <td class="solid-black"  align=""><strong>Anfitrión: </strong>{{$usu->nombre_anfitrion}}<br><strong>Edad: </strong>{{$usu->edad_anfitrion}}<br>
                                <strong>Celebracón: </strong>{{$usu->motivo_celebracion}}<br><strong>Ciudad: </strong>{{$usu->ciudad}}<br><strong>N° Invitados: </strong>{{$usu->numero_invitado}}<br><strong>Duración: </strong>{{$usu->duracion}}<br>
                                <strong>Fecha Evento: </strong>{{$usu->fecha_evento}}<br><strong>Fecha Terminación: </strong>{{$usu->fecha_fin_evento}}<br><strong>Observación: </strong>{{$usu->observacion}}<br></td>
                                <td class="solid-black" align="center"><strong>{{$usu->nombre}}</strong></td>
                                <td class="solid-black" style="font-size:14px;" >{{$usu->descripcion_p}}</td>
                            </tr><br><br><br><br>
                        </table>
                        </tbody>
                        ...............................................................................................................................................................................
                    </section>
                        <table align="center" style="font-size:10px;">
                            
                            <tr>
                                <td class="solid-black" align="left" width=350 style="font-size:15px;"><strong>Total:  </strong></td>
                                <td>                                                      </td>
                                <td class="solid-black" align="right"  width=150 style="font-size:15px;">{{$usu->costo_paquete}}</td>
                            </tr>
                        </table>
                        ...............................................................................................................................................................................
                        <br>
                        <br>
                        <br>
                        <table style="font-size:10px;" align="center">
                            <tr>
                                <td class="solid-black" width=150 style="font-size:15px;"><strong>Elaborado: </strong>{{$usu->nombre_asesor}}</td>
                                <td class="solid-black" width=150 style="font-size:15px;"><strong>Autorizado por: </strong>{{$usu->nombre_completo}}</td>
                                
                            </tr>
                            
                        </table>
                        <br>
                            <br>
                            <br>
                            <br>
                        <table style="font-size:10px;" align="center">
                            
                            <td class="solid-black" width=100 style="font-size:15px;"><strong>Acepto Términos y Condiciones Estipulados en este Documento</strong></td>
                            </table>
                   <?php } ?>
                </div>
            </div>
        </div>
    </div>


</body>
</html>