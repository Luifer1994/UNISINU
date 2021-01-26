
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialDate: '2020-09-12',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2020-09-01'
        },
        {
          title: 'Long Event',
          start: '2020-09-07',
          end: '2020-09-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-09-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-09-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2020-09-11',
          end: '2020-09-13'
        },
        {
          title: 'Meeting',
          start: '2020-09-12T10:30:00',
          end: '2020-09-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2020-09-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2020-09-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2020-09-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2020-09-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2020-09-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-09-28'
        }
      ]
    });

    calendar.render();
  });

</script>

@if (session()->has('mensaje'))
    <script>
        swal({
        title: "EXITO",
        text: " {{ session('mensaje') }}",
        icon: "success",
        button: "OK",
        });
    </script>
@endif
<h2>ESPACIOS UNISINU</h2>
<div class="form-row">
    <div class="form-group col-md-2">
        <select wire:model='searh' name="searh" class="form-control form-control-sm">
            <option value="">Todos los espacios</option>
            <option value="deportes">Deportes</option>
            <option value="tecnologia">Tecnologia</option>
            <option value="eventos">Eventos</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <input wire:model='searh' type="text" class="form-control form-control-sm" placeholder="Buscar">
    </div>
</div>
<div class="form-row">
    @foreach ($espacios as $espacio)
        <div class="form-group col-md-4">
            <div class="card p-0">
                <div class="text-center">
                    <img class="img-fluid" alt="Responsive image" src="{{ asset('storage/'.$espacio->foto) }}">
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h3>{{ $espacio->nombre }}</h3>
                    </div>
                    <p>{{ $espacio->descripcion }}</p>
                    <button class="btn btn-primary btn-sm btn-block">Ver disponibilidad</button>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $espacios->links() }}

<div class="" id="calendar"></div>

