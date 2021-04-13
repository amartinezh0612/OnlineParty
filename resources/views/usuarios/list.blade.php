@extends ('layouts.admin')
@section('contenido')
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.js">
    </script>
    <div class="app-main__inner col">
        <div class="app-page-title">
            <div class="page-title-wrapper ">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>USUARIOS
                        <div class="page-title-subheading">Sistema de Administración de Online Party
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                <img width="200" height="120" class="group list-group-image" align="center" src="{{ asset('images/logo-inverse.png') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal-body {
         
            overflow-x: auto;
            
        }
    </style>
</head>
@foreach($usuarios as $usu)
<div class="modal fade" aria-hidden="true" id="modal-vista-{{$usu->id_usuario}}" role="dialog" tabindex="-1" data-backdrop="false">
    <br>
    <br>
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
            <div class="modal-header header-primary">
                <h4 class="modal-title">Vista completa de Usuarios</h4>
            </div>
            <div class="modal-body">
               
                    <table class="table table-borderless table-sm table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th nowrap>Documento</th>
                                <th nowrap>Nombre</th>
                                <th nowrap>Teléfono</th>
                                <th nowrap>Correo </th>
                                <th nowrap>Invitados</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody class="text-center">
                                    <td >{{$usu->documento}}</td>
                                    <td >{{$usu->nombre_completo}}</td>
                                    <td >{{$usu->telefono}}</td>
                                    <td >{{$usu->correo_electronico}}</td>
                                    <td >{{$usu->numero_invitado}}</td>
                                    
                                    
                                    
                        </tbody>
                    </table>
                    <table class="table table-borderless table-sm table-bordered">
                        <thead class="text-center">
                            <tr>
                               
                                <th nowrap>Paquete</th>
                                <th nowrap>Costo</th>
                                <th nowrap>Fecha Evento</th>
                                <th nowrap>Fecha Terminación</th>
                                <th nowrap>Ciudad/Pais</th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-center">
                                    
                                    <td nowrap>{{$usu->nombre}}</td>
                                    <td nowrap>{{$usu->costo_paquete}}</td>
                                    <td nowrap>{{$usu->fecha_evento}}</td>
                                    <td nowrap>{{$usu->fecha_fin_evento}}</td>
                                    <td nowrap>{{$usu->ciudad}}</td>
                                    
                        </tbody>
                    </table>
                    <table class="table table-borderless table-sm table-bordered">
                        <thead class="text-center">
                            <tr>
                               
                                <th nowrap>Fecha Llamada</th>
                                <th nowrap>Celebración</th>
                                <th nowrap>Anfitrión</th>
                                <th nowrap>Edad Anfitrion</th>
                                <th nowrap>Duración Evento</th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-center">
                                    
                                <td >{{$usu->fecha_llamada}}</td>
                                <td >{{$usu->motivo_celebracion}}</td>
                                <td >{{$usu->nombre_anfitrion}}</td>
                                <td >{{$usu->edad_anfitrion}}</td>
                                <td >{{$usu->duracion}}</td>
                                    
                        </tbody>
                    </table>
                    <table class="table table-borderless table-sm table-bordered">
                        <thead class="text-center">
                            <tr>
                                
                                <th nowrap>Edades</th>
                                <th nowrap>Comunicado</th>
                                <th nowrap>Asesor</th>
                                <th nowrap>Observación</th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-center">
                                
                                <td nowrap>{{$usu->rango_edad_inv}}</td>
                                <td nowrap >{{$usu->comunicado}}</td>
                                <td nowrap>{{$usu->nombre_asesor}}</td>
                                <td nowrap>{{$usu->observacion}}</td>
                                
                        </tbdoy>
                    </table>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<section class="content">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <center class="page-title-actions" >
                    <a href="usuarios/create"> <button type="button"  data-toggle="tooltip" title="Registrar" data-placement="bottom"
                            class="btn-shadow mr-3 btn btn-primary">
                            Agregar <i class="fa fa-plus-circle"></i>
                        </button></a>
                </center>
                <table class="table table-bordered table-striped" id="tblpaquetes">
                    <thead>
                        <tr>
                                <th >Nombre</th>
                                <th >Teléfono</th>
                                <th >Correo</th>
                                <th >Anfitrión</th>
                                <th >Paquete</th>
                                <th >Evento</th>
                                <th class="col-sm-3">Asesor</th>
                                <th class="col-sm-3">Observación</th>
                                <th nowrap>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $usu)
                            <tr>
                                <td nowrap>{{$usu->nombre_completo}}</td>
                                <td >{{$usu->telefono}}</td> 
                                <td >{{$usu->correo_electronico}}</td>
                                <td >{{$usu->nombre_anfitrion}}</td>
                                <td >{{$usu->nombre}}</td>
                                <td nowrap>{{$usu->fecha_evento}}</td>
                                <td >{{$usu->nombre_asesor}}</td>      
                                <td >{{$usu->observacion}}</td>               
                                <td nowrap>
                                    <a href="{{URL::action('UsuariosController@edit',$usu->id_usuario)}}"><button
                                        class="btn btn-primary btn-sm"  data-toggle="tooltip" ><i class="fas fa-edit fa-lg"></i></button>
                                    </a>
                                 
                                    <a href="#" data-target="#modal-vista-{{$usu->id_usuario}}" data-toggle="modal"><button
                                         class="btn btn-primary btn-sm" data-toggle="tooltip" ><i class="fas fa-eye fa-lg"></i></button>
                                    </a></i>
                                    
                                    <a href="{{url('pdfusuarios', $usu->id_usuario)}}" target="_blank">
                                    <button type="button" class="btn btn-info btn-sm"><i class="fa fa-file fa-lg"></i></button> &nbsp;</a>
                    
                                </td>
                                
                            </td>
                            @include('usuarios.modal')
                        @endforeach
                    </tbody>
                    <script>
                        $(document).ready(function () {
                            $('#tblpaquetes').DataTable({
                                "language": {
                                    "lengthMenu": "_MENU_ Registros por pagina",
                                    "zeroRecords": "Sin Resultados",
                                    "search": "Buscar:",
                                    "info": "Listado _PAGE_ de _PAGES_ Paginas",
                                    "infoEmpty": "Sin Resultados",
                                    "infoFiltered": "(Busqueda de un total _MAX_ registros)",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                }
                            });
                        });

                    </script>
                </table>
            </div>
            {{$usuarios->links()}}
        </div>
    </div>
</section>

</html>
@stop
