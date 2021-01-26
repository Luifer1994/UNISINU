 <!-- Modal -->
 <div class="modal fade" id="register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="text-center p-2">
            <img width="60px" src="{{ asset('assets/img/logo.png') }}" alt="">
            <h3 class="text-bold">REGISTRO</h3>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('registro') }}">
                @csrf
                <div class="row">
                    <div class="col-12 mb-2">
                        <input class="form-control" value="{{ old('cedula') }}" type="number" name="cedula" id="" placeholder="Ingresa tu numero de cedula">
                    </div>
                    <div class="col-12 mb-2">
                        <input class="form-control" value="{{ old('codigo') }}" type="number" name="codigo" id="" placeholder="Ingresa tu codigo de funcionario">
                    </div>
                    <div class="col-12">
                        <input class="form-control" type="password" name="password" id="" placeholder="Escribe una contraseña">
                    </div>
                    <div class="col-12">
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">CANCELAR</button>
                            <button type="submit" class="btn btn-primary btn-sm">REGISTRAR</button>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <br>
        </div>
    </div>
    </div>
</div>

