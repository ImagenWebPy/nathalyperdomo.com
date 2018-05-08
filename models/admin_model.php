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

    public function loadFullCalendar($datos) {
        $start = date('Y-m-d H:i:s', strtotime($datos['start']));
        $end = date('Y-m-d H:i:s', strtotime($datos['end']));
        $sql = $this->db->select("select t.*, p.nombre, p.apellido from turno t
                                LEFT JOIN paciente p on p.id = t.id_paciente 
                                where t.start >= '$start' and t.end <= '$end'");
        return $sql;
    }

    public function update_turno($datos) {
        $id = $datos['id'];
        $update = array(
            'start' => date('Y-m-d H:i:s', strtotime($datos['start'])),
            'end' => date('Y-m-d H:i:s', strtotime($datos['end'])),
        );
        $this->db->update('turno', $update, "id = $id");
    }

    public function eliminar_turno($datos) {
        $id = $datos['id'];
        $sth = $this->db->prepare("delete from turno where id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
        return true;
    }

    public function listadoDTDepartamentos($datos) {
        $columns = array(
            0 => 'id',
            1 => 'descripcion',
            2 => 'estado',
            6 => 'accion',
        );
        #getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM departamento");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT * FROM departamento where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (descripcion LIKE '%" . $requestData['search']['value'] . "%')";
            #when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM departamento where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            if ($row['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="departamento" data-rowid="departamento_" data-tabla="departamento" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="departamento" data-rowid="departamento_" data-tabla="departamento" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="btnEditar pointer btn-xs" data-id="' . $id . '" data-url="modal_editar_departamento" data-id=""><i class="fa fa-edit"></i> Editar </a>';
            $nestedData = array();
            $nestedData['DT_RowId'] = 'departamento_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["descripcion"]);
            $nestedData[] = $estado;
            $nestedData[] = $btnEditar;
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($datos['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );

        return json_encode($json_data);
    }

    public function cambiarEstado($datos) {
        $id = $datos['id'];
        $tabla = $datos['tabla'];
        $campo = $datos['campo'];
        $seccion = $datos['seccion'];
        $estado = $datos['estado'];
        #Actualizamos el estado de acuerdo al valor actual
        if ($estado == 1)
            $newEstado = 0;
        else
            $newEstado = 1;
        $update = array(
            $campo => $newEstado
        );
        $this->db->update($tabla, $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable($seccion, $tabla, $id)
        );
        return $data;
    }

    private function rowDataTable($seccion, $tabla, $id) {
        $sql = $this->db->select("SELECT * FROM $tabla WHERE id = $id;");
        $data = '';
        switch ($seccion) {
            case 'departamento':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="departamento" data-rowid="departamento_" data-tabla="departamento" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="departamento" data-rowid="departamento_" data-tabla="departamento" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="btnEditar pointer btn-xs" data-id="' . $id . '" data-url="modal_editar_departamento" data-id=""><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $id . '</td>'
                        . '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
        }
        return $data;
    }

    public function modal_editar_departamento($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from departamento where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';

        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarDepartamento" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Departamento</label>
                                    <input type="text" name="descripcion" class="form-control" placeholder="Departamento" value="' . utf8_encode($sql[0]['descripcion']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Departamento</button>
                            </div>
                        </form>
                    </div>
                </div> 
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Departamento',
            'content' => $modal
        );
        return $data;
    }

    public function frmEditarDepartamento($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }

        $update = array(
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $estado
        );
        $this->db->update('departamento', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('departamento', 'departamento', $id),
            'id' => $id
        );
        return $data;
    }

}
