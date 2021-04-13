<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$usu->id_usuario}}" data-backdrop="false">
    {{Form::Open(array('action'=>array('UsuariosController@destroy',$usu->id_usuario),'method'=>'delete'))}}
    <br>
    <br>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Usuario</h4>
            </div>
            <div class="modal-body">
                <p>Está seguro que desea eliminar el Usuario?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary"
                    data-dismiss="modal">Cerrar</button>
                <button type="submit"
                    class="mb-2 mr-2 border-0 btn-transition btn btn-outline-success">Confirmar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"  data-backdrop="false">
    <form class="needs-validation" novalidate method="POST" action="{{route('usuarios.update', $usu->id_usuario)}}">
        {!! method_field('PUT')!!}
        @csrf
        <br>
        <br>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Usuario</h4>
                </div>
                
                <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" data-backdrop="false"
                      id="modal-vista">
                <input type="hidden" name="id_usuario" value="{{$usu->id_usuario}}" required>
                <input type="hidden" name="nombre_completo" value="{{$usu->nombre_completo}}" required>
                <input type="hidden" name="correo_electronico" value="{{$usu->correo_electronico}}" required>
                <input type="hidden" name="telefono" value="{{$usu->telefono}}" required>
                <input type="hidden" name="fecha_llamada" value="{{$usu->fecha_llamada}}" required>
                <input type="hidden" name="ciudad" value="{{$usu->ciudad}}" required>
                <input type="hidden" name="motivo_celebracion" value="{{$usu->motivo_celebracion}}" required>
                <input type="hidden" name="fecha_evento" value="{{$usu->fecha_evento}}" required>
                <input type="hidden" name="numero_invitado" value="{{$usu->numero_invitado}}" required>
                <input type="hidden" name="rango_edad_inv" value="{{$usu->rango_edad_inv}}" required>
                <input type="hidden" name="duracion" value="{{$usu->duracion}}" required>
                <input type="hidden" name="nombre_anfitrion" value="{{$usu->nombre_anfitrion}}" required>
                <input type="hidden" name="edad_anfitrion" value="{{$usu->edad_anfitrion}}" required>
                <input type="hidden" name="nombre" value="{{$usu->nombre}}" required>
                <input type="hidden" name="comunicado" value="{{$usu->comunicado}}" required>
                <input type="hidden" name="nombre_asesor" value="{{$usu->nombre_asesor}}" required>
                <input type="hidden" name="observacion" value="{{$usu->observacion}}" required>
                </div>
               

                <div class="modal-footer">
                    <button type="button" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </form>
</div>