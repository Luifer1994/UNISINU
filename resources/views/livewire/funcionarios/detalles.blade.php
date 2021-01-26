<!-- Modal -->
<div wire:ignore.self class="modal fade" id="detalles<?=$num?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detalles de <span style="color: black">{{ $funcionario->nombre }}</span></h5>
            </div>
            <div class="modal-body">
                <div class="">
                    <h5>CODIGO INSTITUCIONAL: <span style="color: black">{{ $funcionario->codigo }}</span></h5>
                    <h5>TELEFONO: <span style="color: black">{{ $funcionario->telefono }}</span></h5>
                    <h5>CORREO: <span style="color: black">{{ $funcionario->email }}</span></h5>
                    <h5>CIUDAD: <span style="color: black">{{ $funcionario->nombreC }}</span></h5>
                    <h5>DIRECCION : <span style="color: black">{{ $funcionario->direccion }}</span></h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>
