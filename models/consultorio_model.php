<?php

class Consultorio_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function reserva($datos) {
        $id_paciente = '';
        #datos POST
        $nombrePaciente = trim($datos['nombre']);
        $emailPaciente = trim($datos['email']);
        $telefonoPaciente = trim($datos['telefono']);
        $fecha_reserva = trim($datos['fecha_reserva']);
        $fecha_reserva = explode('/', $fecha_reserva);
        $fecha_posible = $fecha_reserva[1] . '-' . $fecha_reserva[0] . '-' . $fecha_reserva[2];
        $fecha_posibleReserva = date('Y-m-d', strtotime($fecha_posible));
        $hora_reserva = trim($datos['hora_reserva']);
        $hora_reserva = explode('-', $hora_reserva);
        $hora_desde = trim($hora_reserva[0]);
        $hora_hasta = trim($hora_reserva[1]);
        $comentario = trim($datos['comentario']);
        #verificamos que el email exista en la tabla de pacientes
        $sqlVerificaCliente = $this->db->select("select id, email from paciente where email = '$emailPaciente'");
        if (empty($sqlVerificaCliente)) {
            #creamos al paciente
            $this->db->insert('paciente', array(
                'email' => $emailPaciente,
                'nombre' => $nombrePaciente,
                'celular' => $telefonoPaciente,
                'fecha_registro' => date('Y-m-d'),
                'estado' => 1
            ));
            $id_paciente = $this->db->lastInsertId();
        } else {
            $id_paciente = $sqlVerificaCliente[0]['id'];
        }
        #verificamos que el paciente ya no haya reservado turno en el mismo dia
        $sqlTurnoDia = $this->db->select("select * from turno where `start` BETWEEN '$fecha_posibleReserva 00:00:00' and '$fecha_posibleReserva 23:59:59' and id_paciente = $id_paciente");
        if (empty($sqlTurnoDia)) {
            #verificamos que el turno no coincida con otro
            $sqlTurnoReservado = $this->db->select("select * from turno where `start` = '$fecha_posibleReserva $hora_desde:00' and `end` = '$fecha_posibleReserva $hora_hasta:00'");
            if (empty($sqlTurnoReservado)) {
                #insertamos la reserva
                $this->db->insert('turno', array(
                    'id_paciente' => $id_paciente,
                    'title' => 'Reserva Web',
                    'descripcion' => $comentario,
                    'start' => "$fecha_posibleReserva $hora_desde:00",
                    'end' => "$fecha_posibleReserva $hora_hasta:00"
                ));
                $data = array(
                    'type' => 'success',
                    'content' => '<div class="blockquote blockquote_modern">
									<div class="blockquote_wrapper">
										<blockquote>
											GRACIAS, su reserva ha ingresado a nuestro sistema. Una vez que nos pongamos en contacto con usted su resrva estará confirmada.<br>Estado actual de la reserva: PENDIENTE
										</blockquote>
									</div>
								</div>'
                );
            } else {
                #ya existe una reserva en el dia en ese mismo horario
                $data = array(
                    'type' => 'error',
                    'content' => '<div class="blockquote blockquote_modern">
									<div class="blockquote_wrapper">
										<blockquote>
											Lo sentimos, otro paciente ya ha reservado en el mismo horario que esta queriendo reservar.
										</blockquote>
									</div>
								</div>'
                );
            }
        } else {
            #ya reservo en el dia
            $data = array(
                'type' => 'error',
                'content' => '<div class="blockquote blockquote_modern">
									<div class="blockquote_wrapper">
										<blockquote>
											Ha ocurrido un error, ya ha agendado un consulta en el dia seleccionado.
										</blockquote>
									</div>
								</div>'
            );
        }
        $webData = $this->helper->web_datos();
        $email = $webData['email'];
        return $data;
    }

}
