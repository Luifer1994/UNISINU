@extends('layouts.plantilla')
@section('titulo')
    Reservas
@endsection
@section('contenido')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reservar espacio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="form">
                        @csrf
                        <div class="">
                            <input type="hidden" name="space" id="space" value="{{ $espacio->id }}">
                            <div class="form-group col-md-12">
                                <label>Fecha y hora reserva:</label>
                                <input id="start" name="start" type="datetime-local" class="form-control">
                                @error('start')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label>Fecha y hora final:</label>
                                <input id="end" name="end" type="datetime-local" class="form-control">
                                @error('start')<p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button id="btnGuardar" type="button" class="btn btn-primary">Guardar reserva</button>
                </div>
            </div>
        </div>
    </div>
    <div id='calendar'>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let formulario = document.querySelector("#form");
            var calendarEl = document.getElementById('calendar');

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: "es",
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth, timeGridWeek, timeGridDay',
                },

                eventSources:"{{ route('reservas.show') }}",
                // events: [
                //     {
                //         title:"Mi evento 1",
                //         start:"2021-05-07 12:30:00"
                //     },{
                //         title:"Mi evento 2",
                //         start:"2021-05-08 12:30:00",
                //         end:"2021-07-08 13:30:00",
                //         color:"#AA00FF",
                //         textColor:"#000000"
                //     }
                // ],



                dateClick: function(info) {
                    $("#exampleModal").modal("show");
                }
            });
            calendar.render();

            document.getElementById("btnGuardar").addEventListener("click", function() {

                const datos = new FormData(formulario);
                // console.log(datos.entries());
                // console.log(formulario.identification.value);

                axios.post("http://127.0.0.1:8000/reservas/store", datos)
                    .then(res => {
                        $("#exampleModal").modal("hide");
                    })
                    .catch(err => {
                        console.error(err);
                    })

            });
        });

    </script>

@endsection
