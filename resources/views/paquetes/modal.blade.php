<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$pac->id_paquete}}" data-backdrop="false">
    {{Form::Open(array('action'=>array('PaquetesController@destroy',$pac->id_paquete),'method'=>'delete'))}}
    <br>
    <br>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Paquete</h4>
            </div>
            <div class="modal-body">
                <p>Está seguro que desea eliminar el Paquete?</p>
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
    <form class="needs-validation" novalidate method="POST" action="{{route('paquetes.update', $pac->id_paquete)}}">
        {!! method_field('PUT')!!}
        @csrf
        <br>
        <br>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Paquete</h4>
                </div>
                <div class="modal-body">
                <input type="hidden" name="id_paquete" value="{{$pac->id_paquete}}" required>
                <input type="hidden" name="nombre" value="{{$pac->nombre}}" required>
                <input type="hidden" name="descripcion_p" value="{{$pac->descripcion_p}}" required>
                <input type="hidden" name="costo_paquete" value="{{$pac->costo_paquete}}" required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </form>
</div>