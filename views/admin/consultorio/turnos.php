<?php $helper = new Helper(); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Turnos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>admin">Dashboard</a>
            </li>
            <li>
                Consultorio
            </li>
            <li class="active">
                <strong>Turnos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Agregar Turno</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form method="POST" id="frmAgregarTurnoPaciente">
                            <div class="form-group">
                                <label>Paciente</label>
                                <select name="paciente" id="selectPaciente" data-placeholder="Seleccione un Paciente..." class="form-control chosen-select"  tabindex="2">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($helper->getPacientes() as $paciente): ?>
                                        <option value="<?= $paciente['id']; ?>"><?= utf8_encode($paciente['apellido']) . ' ' . utf8_encode($paciente['nombre']); ?></option>
                                    <?php endforeach; ?>
                                    <option value="nuevo">Agregar Nuevo Paciente</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Motivo</label>
                                <input type="text" name="motivo" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea name="observaciones" class="form-control"></textarea>
                            </div>
                            <div class="form-group" id="fechaPaciente">
                                <label>Fecha</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hora Desde</label>
                                <select name="hora_desde" class="form-control chosen-select">
                                    <option value="">Seleccione un Horario</option>
                                    <?php foreach ($helper->getRangoHoras() as $horas): ?>
                                        <option value="<?= $horas; ?>"><?= $horas; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hora Hasta</label>
                                <select name="hora_hasta" class="form-control chosen-select">
                                    <option value="">Seleccione un Horario</option>
                                    <?php foreach ($helper->getRangoHoras() as $horas): ?>
                                        <option value="<?= $horas; ?>"><?= $horas; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" id="btnAgendarTurno">Agendar Turno</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Calendario</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="createEventModal" class="modal fade" role="dialog" style="display: none;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Add Event</h4>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label" for="inputPatient">Event:</label>
                    <div class="field desc">
                        <input class="form-control" id="title" name="title" placeholder="Event" type="text" value="">
                    </div>
                </div>

                <input type="hidden" id="startTime" value="2018-05-01T06:00:00">
                <input type="hidden" id="endTime" value="2018-05-01T06:30:00">



                <div class="control-group">
                    <label class="control-label" for="when">When:</label>
                    <div class="controls controls-row" id="when" style="margin-top:5px;">Tuesday, May 1st 2018, 6:00 - 6:30</div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
            </div>
        </div>

    </div>
</div>
<div id="calendarModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Event Details</h4>
            </div>
            <div id="modalBody" class="modal-body">
                <h4 id="modalTitle" class="modal-title"></h4>
                <div id="modalWhen" style="margin-top:5px;"></div>
            </div>
            <input type="hidden" id="eventID">
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#selectPaciente').chosen({width: "100%"});
        $("#fechaPaciente .input-group.date").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });
        /* initialize the external events
         -----------------------------------------------------------------*/
        /* initialize the calendar
         -----------------------------------------------------------------*/
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'agendaWeek',
            editable: true,
            selectable: true,
            allDaySlot: false,
            events: '<?= URL; ?>admin/loadFullCalendar',
            businessHours: [// specify an array instead
                {
                    dow: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
                    start: '08:00', // 8am
                    end: '20:00' // 6pm
                },
                {
                    dow: [6], // Thursday, Friday
                    start: '09:00', // 10am
                    end: '12:00' // 4pm
                }
            ],
            eventClick: function (event, jsEvent, view) {
                endtime = $.fullCalendar.moment(event.end).format('h:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                $('#modalTitle').html(event.title);
                $('#modalWhen').text(mywhen);
                $('#eventID').val(event.id);
                $('#calendarModal').modal();
            },
            //header and other values
            select: function (start, end, jsEvent) {
                endtime = $.fullCalendar.moment(end).format('h:mm');
                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                start = moment(start).format();
                end = moment(end).format();
                $('#createEventModal #startTime').val(start);
                $('#createEventModal #endTime').val(end);
                $('#createEventModal #when').text(mywhen);
                $('#createEventModal').modal('toggle');
            },
            eventDrop: function (event, delta) {
                $.ajax({
                    url: 'index.php',
                    data: 'action=update&title=' + event.title + '&start=' + moment(event.start).format() + '&end=' + moment(event.end).format() + '&id=' + event.id,
                    type: "POST",
                    success: function (json) {
                        //alert(json);
                    }
                });
            },
            eventResize: function (event) {
                $.ajax({
                    url: 'index.php',
                    data: 'action=update&title=' + event.title + '&start=' + moment(event.start).format() + '&end=' + moment(event.end).format() + '&id=' + event.id,
                    type: "POST",
                    success: function (json) {
                        //alert(json);
                    }
                });
            }
        });
        $('#submitButton').on('click', function (e) {
            // We don't want this to act as a link so cancel the link action
            e.preventDefault();
            doSubmit();
        });
        $('#deleteButton').on('click', function (e) {
            // We don't want this to act as a link so cancel the link action
            e.preventDefault();
            doDelete();
        });
        function doDelete() {
            $("#calendarModal").modal('hide');
            var eventID = $('#eventID').val();
            $.ajax({
                url: 'index.php',
                data: 'action=delete&id=' + eventID,
                type: "POST",
                success: function (json) {
                    if (json == 1)
                        $("#calendar").fullCalendar('removeEvents', eventID);
                    else
                        return false;
                }
            });
        }
        function doSubmit() {
            $("#createEventModal").modal('hide');
            var title = $('#title').val();
            var startTime = $('#startTime').val();
            var endTime = $('#endTime').val();
            $.ajax({
                url: 'index.php',
                data: 'action=add&title=' + title + '&start=' + startTime + '&end=' + endTime,
                type: "POST",
                success: function (json) {
                    $("#calendar").fullCalendar('renderEvent',
                            {
                                id: json.id,
                                title: title,
                                start: startTime,
                                end: endTime,
                            },
                            true);
                }
            });
        }
        $(document).on("change", "#selectPaciente", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var valor = $(this).val();
                if (valor == 'nuevo') {
                    $.ajax({
                        url: "<?= URL; ?>admin/agregarNuevoPaciente",
                        type: "POST",
                        dataType: "json"
                    }).done(function (data) {
                        $(".genericModal .modal-header").removeClass("modal-header").addClass("modal-header bg-primary");
                        $(".genericModal .modal-title").html(data.titulo);
                        $(".genericModal .modal-body").html(data.contenido);
                        $(".genericModal").modal("toggle");
                    });
                }
            }
            e.handled = true;
        });
        $(document).on("change", ".selectDepartamento", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var id_departamento = $(this).val();
                $.ajax({
                    url: "<?= URL; ?>admin/cargarSelectCiudad",
                    type: "POST",
                    dataType: "json",
                    data: {id_departamento: id_departamento}
                }).done(function (data) {
                    $('.selectCiudad').html('');
                    $('.selectCiudad').append(data.contenido);
                });
            }
            e.handled = true;
        });
        $(document).on("submit", "#frmAgregarNuevoPaciente", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault();
                $.ajax({
                    url: "<?= URL; ?>admin/frmAgregarNuevoPaciente",
                    type: "POST",
                    dataType: "json",
                    data: $("#frmAgregarNuevoPaciente").serialize(),
                }).done(function (data) {
                    $(".genericModal").modal("toggle");
                    //$("#selectPaciente").append(data.contenido);
                    $('#selectPaciente').append("<option value='" + data.key + "'>" + data.value + "</option>");
                    $('#selectPaciente').val(data.key); // if you want it to be automatically selected
                    $('#selectPaciente').trigger("chosen:updated");
                });
            }
            e.handled = true;
        });

        $(document).on("submit", "#frmAgregarTurnoPaciente", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault();
                $.ajax({
                    url: "<?= URL; ?>admin/frmAgregarTurnoPaciente",
                    type: "POST",
                    dataType: "json",
                    data: $("#frmAgregarTurnoPaciente").serialize(),
                }).done(function (data) {
                    $("#calendar").fullCalendar('renderEvent',
                            {
                                id: data.id,
                                title: data.title,
                                start: data.start,
                                end: data.end,
                            },
                            true);
                });
            }
            e.handled = true;
        });
    });
</script>