<?php

class Admin_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function agregarNuevoPaciente() {
        $sqlTipoDocumento = $this->db->select("select * from tipo_documento where estado = 1");
        $sqlDepartamento = $this->db->select("select * from departamento where estado = 1 order by id ASC");
        $modal = '<div class="row">
                    <form id="frmAgregarNuevoPaciente" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipo de Documento:</label>
                                    <select name="tipo_documento" class="form-control chosen-select">
                                        <option value="">Seleccione un Tipo de Documento</value>';
        foreach ($sqlTipoDocumento as $tipo) {
            $modal .= '              <option value="' . $tipo['id'] . '">' . utf8_encode($tipo['descripcion']) . '</value>';
        }
        $modal .= '              </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Número Documento:</label>
                                <input type="text" class="form-control" name="documento">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departamento:</label>
                                    <select name="departamento" class="form-control chosen-select selectDepartamento">
                                        <option value="">Seleccione un Departamento</value>';
        foreach ($sqlDepartamento as $departamento) {
            $modal .= '              <option value="' . $departamento['id'] . '">' . utf8_encode($departamento['descripcion']) . '</value>';
        }
        $modal .= '              </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ciudad:</label>
                                    <select name="ciudad" class="form-control chosen-select selectCiudad">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Barrio:</label>
                                    <input type="text" class="form-control" name="barrio">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dirección:</label>
                                    <input type="text" class="form-control" name="direccion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control" name="nombre">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Apellido:</label>
                                    <input type="text" class="form-control" name="apellido">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Teléfono:</label>
                                    <input type="text" class="form-control" name="telefono">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Celular:</label>
                                    <input type="text" class="form-control" name="celular">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="data_1">
                                    <label>Fecha de Nacimiento</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha_nacimiento">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-w-m btn-primary btn-block btn-lg">Agregar Paciente</button>
                                </div>
                        </div>
                    </form>
                </div>
                <script>
                    $(document).ready(function () {
                        $("#data_1 .input-group.date").datepicker({
                            todayBtn: "linked",
                            keyboardNavigation: false,
                            forceParse: false,
                            calendarWeeks: true,
                            autoclose: true
                        });
                    });
                </script>';
        $data = array(
            'type' => 'success',
            'titulo' => 'Agregar Paciente',
            'contenido' => $modal
        );
        return $data;
    }

    public function cargarSelectCiudad($datos) {
        $id_departamento = $datos['id_departamento'];
        $sql = $this->db->select("select id, descripcion from ciudad where id_departamento = $id_departamento and estado = 1 order by descripcion ASC");
        $option = '';
        foreach ($sql as $item) {
            $option .= '<option value="' . $item['id'] . '">' . utf8_encode($item['descripcion']) . '</option>';
        }
        $data = array(
            'type' => 'success',
            'contenido' => $option
        );
        return $data;
    }

    public function frmAgregarNuevoPaciente($datos) {
        $fechaRegistro = str_replace('/', '-', $datos['fecha_registro']);
        $fechaNacimiento = str_replace('/', '-', $datos['fecha_nacimiento']);
        $this->db->insert('paciente', array(
            'id_tipo_documento' => $datos['id_tipo_documento'],
            'id_ciudad' => $datos['id_ciudad'],
            'documento' => $datos['documento'],
            'email' => $datos['email'],
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'telefono' => $datos['telefono'],
            'celular' => $datos['celular'],
            'direccion' => $datos['direccion'],
            'barrio' => $datos['barrio'],
            'fecha_registro' => date('Y-m-d', strtotime($fechaRegistro)),
            'fecha_nacimiento' => date('Y-m-d', strtotime($fechaNacimiento)),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        $data = array();
        if (!empty($id)) {
            $sql = $this->db->select("select nombre, apellido from paciente where id = $id");
            //$option = '<option value="' . $id . '">' . utf8_encode($sql[0]['nombre']) . ' ' . utf8_encode($sql[0]['apellido']) . '</option>';
            $data = array(
                'type' => 'success',
                'key' => $id,
                'value' => utf8_encode($sql[0]['nombre']) . ' ' . utf8_encode($sql[0]['apellido'])
            );
        }
        return $data;
    }

    public function frmAgregarTurnoPaciente($datos) {
        $this->db->insert('turno', array(
            'id_paciente' => $datos['id_paciente'],
            'title' => $datos['title'],
            'descripcion' => $datos['descripcion'],
            'start' => $datos['start'],
            'end' => $datos['end']
        ));
        $id = $this->db->lastInsertId();
        $data = array(
            'id' => $id,
            'title' => $datos['title'],
            'start' => $datos['start'],
            'end' => $datos['end']
        );
        return $data;
    }
    
    public function loadFullCalendar($datos){
        $start = date('Y-m-d H:i:s', strtotime($datos['start']));
        $end = date('Y-m-d H:i:s', strtotime($datos['end']));
        $sql = $this->db->select("select * from turno where start >= '$start' and end <= '$end'");
        return $sql;
    }
}
