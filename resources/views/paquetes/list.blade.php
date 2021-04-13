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
                    <div>PAQUETES
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
</head>

<section class="content">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <center class="page-title-actions" >
                    <a href="paquetes/create"> <button type="button"  data-toggle="tooltip" title="Registrar" data-placement="bottom"
                            class="btn-shadow mr-3 btn btn-primary">
                            NUEVO <i class="fa fa-plus-circle"></i>
                        </button></a>
                </center>
                <table class="table table-bordered table-striped" id="tblpaquetes">
                    <thead>
                        <tr>
                            <th >Paquetes</th>
                            <th class="col-sm-5">Descripcion</th>
                            <th >Costo</th>
                            <th >Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($paquetes as $pac)
                        <tr>
                            <td nowrap>{{ $pac->nombre}}</td>
                            <td class="col-sm-5">{{ $pac->descripcion_p }}</td>
                            <td nowrap>{{ $pac->costo_paquete }}</td>
                            <td><a href="{{URL::action('PaquetesController@edit',$pac->id_paquete)}}"><button
                                        class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar"><i
                                            class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a href="#" data-target="#modal-delete-{{$pac->id_paquete}}" data-toggle="modal"><button
                                        class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i
                                            class="fas fa-trash fa-lg"></i></button>
                                </a>
                            </td>
                        </tr>
                        @include('paquetes.modal')
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
         
        </div>
    </div>
</section>

</html>
@stop
