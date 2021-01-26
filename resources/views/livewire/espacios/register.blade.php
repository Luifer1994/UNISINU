 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="registrar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Registrar Nuevo Espacio</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include("livewire.espacios.formulario")
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">CANCERLAR</button>
          <button wire:click='store' type="button" class="btn btn-primary">REGISTRAR</button>
        </div>
      </div>
    </div>
  </div>
