<!-- Modal -->
<div wire:ignore.self class="modal fade" id="detalles<?=$num?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detalle</span></h5>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="text-center">
                        <img class="img-fluid" alt="Responsive image" src="{{ asset('storage/'.$espacio->foto) }}">
                    </div>
                    <hr>
                    <h5>NOMBRE: <span style="color: black">{{ $espacio->nombre }}</span></h5>
                    <h5>DESCRIPCION: <span style="color: black">{{ $espacio->descripcion }}</span></h5>
                    <h5>SEDE: <span style="color: black">{{ $espacio->nombreS }}</span></h5>
                    <h5>CATEGORIA: <span style="color: black">{{ $espacio->nombreC }}</span></h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>
