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
        $idPaciente = $datos['id_paciente'];
        $this->db->insert('turno', array(
            'id_paciente' => $idPaciente,
            'title' => $datos['title'],
            'descripcion' => $datos['descripcion'],
            'start' => $datos['start'],
            'end' => $datos['end']
        ));
        $id = $this->db->lastInsertId();
        $sqlColor = $this->db->select("select ece.color
                                        from turno t
                                        LEFT JOIN estado_color_evento ece on ece.estado = t.estado
                                        where t.id = $id");
        $sqlPaciente = $this->db->select("select * from paciente where id = $idPaciente");
        $data = array(
            'id' => $id,
            'id_paciente' => $idPaciente,
            'title' => $datos['title'],
            'descripcion' => $datos['descripcion'],
            'start' => $datos['start'],
            'end' => $datos['end'],
            'nombre' => utf8_encode($sqlPaciente[0]['nombre']),
            'apellido' => utf8_encode($sqlPaciente[0]['apellido']),
            'color' => $sqlColor[0]['color']
        );
        return $data;
    }

    public function loadFullCalendar($datos) {
        $start = date('Y-m-d H:i:s', strtotime($datos['start']));
        $end = date('Y-m-d H:i:s', strtotime($datos['end']));
        $sql = $this->db->select("select t.*, p.nombre, p.apellido, ece.color 
                                from turno t
                                LEFT JOIN paciente p on p.id = t.id_paciente
                                LEFT JOIN estado_color_evento ece on ece.estado = t.estado
                                where t.start >= '$start' and t.end <= '$end'");
        $data = array();
        $estados = $this->helper->getEnumOptions('turno', 'estado');

        foreach ($sql as $item) {
            $selectEstados = '<div class="row"><div class="col-md-4"><select data-id="' . $item['id'] . '" class="selectEstadoTurno form-control"></div></div>';
            foreach ($estados as $estado) {
                $selected = ($item['estado'] == $estado) ? 'selected' : '';
                $selectEstados .= '<option value="' . $estado . '" ' . $selected . '>' . $estado . '</option>';
            }
            $selectEstados .= '</option>';
            array_push($data, array(
                'id' => $item['id'],
                'id_paciente' => $item['id_paciente'],
                'title' => utf8_encode($item['title']),
                'descripcion' => utf8_encode($item['descripcion']),
                'start' => $item['start'],
                'end' => $item['end'],
                'estado' => $item['estado'],
                'nombre' => utf8_encode($item['nombre']),
                'apellido' => utf8_encode($item['apellido']),
                'color' => $item['color'],
                'estado' => $selectEstados
            ));
        }
        return $data;
    }

    public function update_turno($datos) {
        $id = $datos['id'];
        $update = array(
            'start' => date('Y-m-d H:i:s', strtotime($datos['start'])),
            'end' => date('Y-m-d H:i:s', strtotime($datos['end'])),
        );
        $this->db->update('turno', $update, "id = $id");
    }

    public function cambiarEstadoTurno($datos) {
        $id = $datos['id'];
        $update = array(
            'estado' => $datos['estado'],
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
            $where .= " AND (descripcion LIKE '%" . $datos['search']['value'] . "%')";
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
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modal_editar_departamento" data-id=""><i class="fa fa-edit"></i> Editar </a>';
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

    public function listadoDTCiudades($datos) {
        $columns = array(
            0 => 'ciudad',
            1 => 'departamento',
            2 => 'estado',
            6 => 'accion',
        );
        #getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM ciudad");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT c.id, c.descripcion as ciudad, c.estado, d.descripcion as departamento FROM ciudad c
                LEFT JOIN departamento d on c.id_departamento = d.id where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (c.descripcion LIKE '%" . $datos['search']['value'] . "%' ";
            $where .= " OR d.descripcion LIKE '%" . $datos['search']['value'] . "%' )";
            #when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM ciudad c
                                    LEFT JOIN departamento d on c.id_departamento = d.id where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            if ($row['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="ciudad" data-rowid="ciudad_" data-tabla="ciudad" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="ciudad" data-rowid="ciudad_" data-tabla="ciudad" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarCiudad"><i class="fa fa-edit"></i> Editar </a>';
            $nestedData = array();
            $nestedData['DT_RowId'] = 'ciudad_' . $id;
            $nestedData[] = utf8_encode($row["ciudad"]);
            $nestedData[] = utf8_encode($row["departamento"]);
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
        //$sql = $this->db->select("SELECT * FROM $tabla WHERE id = $id;");
        $data = '';
        switch ($tabla) {
            case 'admin_usuario':
                $sql = $this->db->select("SELECT wa.nombre, wa.email, wr.descripcion as rol, wa.estado
                                        FROM admin_usuario wa
                                        LEFT JOIN admin_rol wr on wr.id = wa.id_rol WHERE wa.id = $id;");
                break;
            case 'ciudad':
                $sql = $this->db->select("SELECT c.id, c.descripcion as ciudad, c.estado, d.descripcion as departamento FROM ciudad c
                                        LEFT JOIN departamento d on c.id_departamento = d.id WHERE c.id = $id;");
                break;
            default :
                $sql = $this->db->select("SELECT * FROM $tabla WHERE id = $id;");
                break;
        }
        switch ($seccion) {
            case 'departamento':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="departamento" data-rowid="departamento_" data-tabla="departamento" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="departamento" data-rowid="departamento_" data-tabla="departamento" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modal_editar_departamento" data-id=""><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $id . '</td>'
                        . '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'ciudad':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="ciudad" data-rowid="ciudad_" data-tabla="ciudad" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="ciudad" data-rowid="ciudad_" data-tabla="ciudad" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarCiudad"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['departamento']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['ciudad']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'slider':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="web_inicio_slider" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="web_inicio_slider" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSlider"><i class="fa fa-edit"></i> Editar </a>';
                if (!empty($sql[0]['imagen'])) {
                    $img = '<img src="' . URL . 'public/images/slider/' . $sql[0]['imagen'] . '" style="width: 160px;">';
                } else {
                    $img = '';
                }
                if ($sql[0]['principal'] == 1) {
                    $principal = '<span class="badge badge-warning">Principal</span>';
                } else {
                    $principal = '<span class="badge">Normal</span>';
                }
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . $img . '</td>'
                        . '<td>' . utf8_encode($sql[0]['texto_1']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['texto_2']) . '</td>'
                        . '<td>' . $principal . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'caracteristicas';
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="caracteristicas" data-rowid="caracteristicas_" data-tabla="web_inicio_caracteristicas" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="caracteristicas" data-rowid="caracteristicas_" data-tabla="web_inicio_caracteristicas" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $icono = '<i class="' . utf8_encode($sql[0]['icon']) . '"></i>';
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarCaracteristicas"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['orden']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['titulo']) . '</td>'
                        . '<td>' . $icono . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'frases':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="frases" data-rowid="frases_" data-tabla="web_frases" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="frases" data-rowid="frases_" data-tabla="web_frases" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarFrases"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['orden']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['frase']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['autor']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'servicios':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="web_inicio_servicios" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="web_inicio_servicios" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarServicios"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['orden']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['servicio']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'verContacto':
                if ($sql[0]['leido'] == 1) {
                    $estado = '<span class="label label-primary">Leído</span>';
                } else {
                    $estado = '<span class="label label-danger">No Leído</span>';
                }
                $btnEditar = '<a class="btnVerContacto pointer btn-xs" data-id="' . $id . '" data-url="modalVerContacto"><i class="fa fa-edit"></i> Ver Datos </a>';
                $data = '<td>' . $id . '</td>'
                        . '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['email']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['asunto']) . '</td>'
                        . '<td>' . date('d-m-Y H:i:s', strtotime($sql[0]['fecha'])) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'blog':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="blog" data-rowid="blog_" data-tabla="web_blog" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="blog" data-rowid="blog_" data-tabla="web_blog" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarBlogPost"><i class="fa fa-edit"></i> Editar </a>';
                $imagen = '<img class="img-responsive imgBlogTable" src="' . URL . 'public/images/blog/' . $sql[0]['imagen_thumb'] . '">';
                $data = '<td>' . $sql[0]['id'] . '</td>'
                        . '<td>' . utf8_encode($sql[0]['titulo']) . '</td>'
                        . '<td>' . $imagen . '</td>'
                        . '<td>' . date('d-m-Y', strtotime($sql[0]['fecha_blog'])) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'usuarios':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="admin_usuario" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="admin_usuario" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTUsuario"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['email']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['rol']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'paciente':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="paciente" data-rowid="paciente_" data-tabla="paciente" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="paciente" data-rowid="paciente_" data-tabla="paciente" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDatosPaciente"><i class="fa fa-edit"></i> Ver Datos / Editar </a>';
                $data = '<td>' . $id . '</td>'
                        . '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['apellido']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['email']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['documento']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['telefono']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['celular']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'redes':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="web_redes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="web_redes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarRedes"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['enlace']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'metatags':
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarMetaTag"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $id . '</td>'
                        . '<td>' . utf8_encode($sql[0]['pagina']) . '</td>'
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

    public function modalEditarCiudad($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT c.id, c.descripcion as ciudad, c.estado, d.id as id_departamento, d.descripcion as departamento FROM ciudad c
                                LEFT JOIN departamento d on c.id_departamento = d.id where c.id = $id");
        $sqlDepartamentos = $this->db->select("select * from departamento where estado = 1");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';

        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarCiudad" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departamento</label>
                                    <select class="form-control" name="id_departamento">
                                        <option value="">Seleccione un Departamento</option>';
        foreach ($sqlDepartamentos as $item) {
            $selected = ($item['id'] == $sql[0]['id_departamento']) ? 'selected' : '';
            $modal .= '                 <option value="' . $item['id'] . '" ' . $selected . '>' . utf8_encode($item['descripcion']) . '</option>';
        }
        $modal .= '                 </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <input type="text" name="descripcion" class="form-control" placeholder="De" value="' . utf8_encode($sql[0]['ciudad']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Ciudad</button>
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
            'titulo' => 'Editar Ciudad',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarCiudad() {

        $sqlDepartamentos = $this->db->select("select * from departamento where estado = 1");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarCiudad" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departamento</label>
                                    <select class="form-control" name="id_departamento">
                                        <option value="">Seleccione un Departamento</option>';
        foreach ($sqlDepartamentos as $item) {
            $modal .= '                 <option value="' . $item['id'] . '">' . utf8_encode($item['descripcion']) . '</option>';
        }
        $modal .= '                 </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <input type="text" name="descripcion" class="form-control" placeholder="De" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Ciudad</button>
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
            'titulo' => 'Editar Ciudad',
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

    public function frmEditarCiudad($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }

        $update = array(
            'id_departamento' => utf8_decode($datos['id_departamento']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $estado
        );
        $this->db->update('ciudad', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('ciudad', 'ciudad', $id),
            'id' => $id
        );
        return $data;
    }

    public function listadoDTSlider() {
        $sql = $this->db->select("SELECT * FROM web_inicio_slider ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="web_inicio_slider" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="web_inicio_slider" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSlider"><i class="fa fa-edit"></i> Editar </a>';
            if (!empty($item['imagen'])) {
                $img = '<img src="' . URL . 'public/images/slider/' . $item['imagen'] . '" style="width: 160px;">';
            } else {
                $img = '-';
            }
            if ($item['principal'] == 1) {
                $principal = '<span class="badge badge-warning">Principal</span>';
            } else {
                $principal = '<span class="badge">Normal</span>';
            }
            array_push($datos, array(
                "DT_RowId" => "slider_$id",
                'orden' => $item['orden'],
                'imagen' => $img,
                'texto1' => utf8_encode($item['texto_1']),
                'texto2' => utf8_encode($item['texto_2']),
                'principal' => $principal,
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function modalEditarDTSlider($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from web_inicio_slider where id = $id");
        $checked = "";
        $checkedPrincipal = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        if ($sql[0]['principal'] == 1)
            $checkedPrincipal = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos del Slider</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarSlider" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Texto 1</label>
                                    <input type="text" name="texto_1" class="form-control" placeholder="Texto 1" value="' . utf8_encode($sql[0]['texto_1']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Texto 2</label>
                                    <input type="text" name="texto_2" class="form-control" placeholder="Texto 2" value="' . utf8_encode($sql[0]['texto_2']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="col-md-3">
                                <div class="i-checks"><label> <input type="checkbox" name="principal" value="1" ' . $checkedPrincipal . '> <i></i> Principal </label></div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                    -Formato: JPG,PNG (La imagen principal tiene que ser PNG transparente)<br>
                                    -Dimensión: Imagen Normal: 1920 x 1080px, Imagen Principal: 310 x 649px<br>
                                    -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileSlider" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgSlider" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileSlider").html5fileupload({
                                    data:{id:' . $id . '},
                                    onAfterStartSuccess: function(response) {
                                        $("#imgSlider" + response.id).html(response.content);
                                        $("#slider_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgSlider' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/slider/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
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
            'titulo' => 'Editar Slider',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function frmEditarSlider($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'texto_1' => utf8_decode($datos['texto_1']),
            'texto_2' => utf8_decode($datos['texto_2']),
            'orden' => $datos['orden'],
            'principal' => $datos['principal'],
            'estado' => $estado
        );
        $this->db->update('web_inicio_slider', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('slider', 'web_inicio_slider', $id)
        );
        return $data;
    }

    public function modalAgregarSlider() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Slider</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . 'admin/frmAgregarSlider" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Texto 1</label>
                                    <input type="text" name="texto_1" class="form-control" placeholder="Texto 1" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Texto 2</label>
                                    <input type="text" name="texto_2" class="form-control" placeholder="Texto 2" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                            </div>
                            <div class="col-md-3">
                                <div class="i-checks"><label> <input type="checkbox" name="principal" value="1"> <i></i> Principal </label></div>
                            </div>
                            <div class="col-md-12">
                                <h3>Imagen</h3>
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG (La imagen principal tiene que ser PNG transparente)<br>
                                        -Dimensión: Imagen Normal: 1920 x 1080px, Imagen Principal: 310 x 649px<br>
                                        -Tamaño: Hasta 2MB<br>
                                    <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                </div>
                                <div class="html5fileupload fileAgregarSlider" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                    <input type="file" name="file_archivo" />
                                </div>
                                <script>
                                    $(".html5fileupload.fileAgregarSlider").html5fileupload();
                                </script>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Slider</button>
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
            'titulo' => 'Agregar Slider',
            'content' => $modal
        );
        return $data;
    }

    public function frmAgregarSlider($datos) {
        $this->db->insert('web_inicio_slider', array(
            'texto_1' => utf8_decode($datos['texto_1']),
            'texto_2' => utf8_decode($datos['texto_2']),
            'orden' => $datos['orden'],
            'principal' => $datos['principal'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarBlogPost($datos) {
        $fecha_blog = $datos['fecha_blog'];
        $fecha_blog = str_replace('/', '-', $fecha_blog);
        $fecha_blog = date('Y-m-d', strtotime($fecha_blog));
        $this->db->insert('web_blog', array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'url_youtube' => $datos['url_youtube'],
            'fecha_blog' => $fecha_blog,
            'fecha_publicacion' => date('Y-m-d H:i:s'),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAddSliderImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('web_inicio_slider', $update, "id = $id");
    }

    public function frmAddBlogImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagen'],
            'imagen_thumb' => $imagenes['imagen_thumb']
        );
        $this->db->update('web_blog', $update, "id = $id");
    }

    public function uploadImgSlider($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('web_inicio_slider', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/slider/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('slider', 'web_inicio_slider', $id)
        );
        return $data;
    }

    public function listadoDTCaracteristicas() {
        $sql = $this->db->select("SELECT * FROM `web_inicio_caracteristicas` order by orden asc;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="caracteristicas" data-rowid="caracteristicas_" data-tabla="web_inicio_caracteristicas" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="caracteristicas" data-rowid="caracteristicas_" data-tabla="web_inicio_caracteristicas" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $icono = '<i class="' . utf8_encode($item['icon']) . '"></i>';
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarCaracteristicas"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "caracteristicas_$id",
                'orden' => utf8_encode($item['orden']),
                'item' => utf8_encode($item['titulo']),
                'icono' => $icono,
                'estado' => $estado,
                'accion' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTServicios() {
        $sql = $this->db->select("SELECT * FROM `web_inicio_servicios` order by orden asc;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="web_inicio_servicios" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="web_inicio_servicios" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarServicios"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "servicios_$id",
                'orden' => utf8_encode($item['orden']),
                'servicio' => utf8_encode($item['servicio']),
                'estado' => $estado,
                'accion' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTFrases() {
        $sql = $this->db->select("SELECT * FROM `web_frases` order by orden asc;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="frases" data-rowid="frases_" data-tabla="web_frases" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="frases" data-rowid="frases_" data-tabla="web_frases" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarFrases"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "frases_" . $id,
                'orden' => utf8_encode($item['orden']),
                'frase' => utf8_encode($item['frase']),
                'autor' => utf8_encode($item['autor']),
                'estado' => $estado,
                'accion' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function modalEditarCaracteristicas($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM web_inicio_caracteristicas where id = $id");
        $sqlIconos = $this->db->select("SELECT * FROM web_medical_icon where estado = 1");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarCaracteristicas" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control" value="' . utf8_encode($sql[0]['titulo']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contenido</label>
                                    <textarea style="height:80px;" name="contenido" class="form-control">' . utf8_encode($sql[0]['contenido']) . '</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Icono</label>
                                    <select class="form-control" name="icon">
                                        <option value="">Seleccione un Icono</option>';
        foreach ($sqlIconos as $item) {
            $selected = ($item['descripcion'] == $sql[0]['icon']) ? 'selected' : '';
            $modal .= '                 <option value="' . $item['descripcion'] . '" ' . $selected . '>' . $item['descripcion'] . '<i class="' . $item['descripcion'] . '"></i></option>';
        }
        $modal .= '                 </select>
                               </div>
                            </div>
                            <div class="col-md-12">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
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
            'titulo' => 'Editar Item Caracteristicas',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarMetaTag($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM web_metatags where id = $id");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" class="frmEditarMetaTags" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pagina</label>
                                    <input type="text" name="titulo" class="form-control" value="' . utf8_encode($sql[0]['pagina']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <textarea style="height:80px;" name="description" class="form-control">' . utf8_encode($sql[0]['description']) . '</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Keywords y/o frases (palabras separadas por comas)</label>
                                    <textarea style="height:80px;" name="keywords" class="form-control">' . utf8_encode($sql[0]['keywords']) . '</textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
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
            'titulo' => 'Editar Item Caracteristicas',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarFrases($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM web_frases where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarFrases" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" name="autor" class="form-control" value="' . utf8_encode($sql[0]['autor']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Frase</label>
                                    <textarea style="height:80px;" name="frase" class="form-control">' . utf8_encode($sql[0]['frase']) . '</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Frase</button>
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
            'titulo' => 'Editar Frase',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarServicios($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM web_inicio_servicios where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarServicios" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre Servicio</label>
                                    <input type="text" name="servicio" class="form-control" value="' . utf8_encode($sql[0]['servicio']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contenido</label>
                                    <textarea style="height:80px;" name="contenido" class="form-control">' . utf8_encode($sql[0]['contenido']) . '</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Servicio</button>
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
            'titulo' => 'Editar Servicio',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalAgregarFrases() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarFrases" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" name="autor" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Frase</label>
                                    <textarea style="height:80px;" name="frase" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"><i></i> Mostrar </label></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Frase</button>
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
            'titulo' => 'Agregar Frase',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarServicio() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarServicio" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre Servicio</label>
                                    <input type="text" name="servicio" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contenido</label>
                                    <textarea style="height:80px;" name="contenido" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"><i></i> Mostrar </label></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Servicio</button>
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
            'titulo' => 'Agregar Servicio',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarCaracteristicas() {
        $sqlIconos = $this->db->select("SELECT * FROM web_medical_icon where estado = 1");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Caracteristica</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarCaracteristicas" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contenido</label>
                                    <textarea style="height:80px;" name="contenido" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Icono</label>
                                    <select class="form-control" name="icon">
                                        <option value="">Seleccione un Icono</option>';
        foreach ($sqlIconos as $item) {
            $modal .= '                 <option value="' . $item['descripcion'] . '">' . $item['descripcion'] . '<i class="' . $item['descripcion'] . '"></i></option>';
        }
        $modal .= '                 </select>
                               </div>
                            </div>
                            <div class="col-md-12">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Contenido</button>
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
            'titulo' => 'Agregar Caracteristicas',
            'content' => $modal
        );
        return $data;
    }

    public function frmEditarCaracteristicas($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'icon' => utf8_decode($datos['icon']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $estado
        );
        $this->db->update('web_inicio_caracteristicas', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('caracteristicas', 'web_inicio_caracteristicas', $id),
            'id' => $id
        );
        return $data;
    }

    public function frmEditarMetaTags($datos) {
        $id = $datos['id'];
        $update = array(
            'description' => utf8_decode($datos['description']),
            'keywords' => utf8_decode($datos['keywords'])
        );
        $this->db->update('web_metatags', $update, "id = $id");
        $sqlPagina = $this->db->select("select pagina from web_metatags where id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('metatags', 'web_metatags', $id),
            'id' => $id,
            'mensaje' => 'Se ha actualizado correctamente los metatags de la pagina "' . utf8_encode($sqlPagina[0]['pagina']) . '"'
        );
        return $data;
    }

    public function frmEditarFrases($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'frase' => utf8_decode($datos['frase']),
            'autor' => utf8_decode($datos['autor']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $estado
        );
        $this->db->update('web_frases', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('frases', 'web_frases', $id),
            'id' => $id
        );
        return $data;
    }

    public function frmEditarBlogPost($datos) {
        $id = $datos['id'];
        $estado = 1;
        $fecha_blog = $datos['fecha_blog'];
        $fecha_blog = str_replace('/', '-', $fecha_blog);
        $fecha_blog = date('Y-m-d', strtotime($fecha_blog));
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'url_youtube' => utf8_decode($datos['url_youtube']),
            'contenido' => utf8_decode($datos['contenido']),
            'fecha_blog' => $fecha_blog,
            'estado' => $estado
        );
        $this->db->update('web_blog', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('blog', 'web_blog', $id),
            'id' => $id
        );
        return $data;
    }

    public function frmEditarServicios($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'servicio' => utf8_decode($datos['servicio']),
            'contenido' => utf8_decode($datos['contenido']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $estado
        );
        $this->db->update('web_inicio_servicios', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('servicios', 'web_inicio_servicios', $id),
            'id' => $id
        );
        return $data;
    }

    public function frmAgregarCaracteristicas($datos) {
        $this->db->insert('web_inicio_caracteristicas', array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'icon' => utf8_decode($datos['icon']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from web_inicio_caracteristicas where id = $id");
        if ($sql[0]['estado'] == 1) {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="caracteristicas" data-rowid="caracteristicas_" data-tabla="web_inicio_caracteristicas" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="caracteristicas" data-rowid="caracteristicas_" data-tabla="web_inicio_caracteristicas" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $icono = '<i class="' . utf8_encode($sql[0]['icon']) . '"></i>';
        $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarCaracteristicas"><i class="fa fa-edit"></i> Editar </a>';
        $data = array(
            'type' => 'success',
            'orden' => utf8_encode($sql[0]['orden']),
            'item' => utf8_encode($sql[0]['titulo']),
            'icono' => $icono,
            'estado' => $estado,
            'accion' => $btnEditar
        );
        return $data;
    }

    public function frmAgregarDatosPaciente($datos) {
        $fecha = (!empty($datos['fecha_nacimiento'])) ? $datos['fecha_nacimiento'] : NULL;
        $this->db->insert('paciente', array(
            'id_tipo_documento' => $datos['id_tipo_documento'],
            'id_ciudad' => $datos['id_ciudad'],
            'documento' => utf8_decode($datos['documento']),
            'email' => utf8_decode($datos['email']),
            'nombre' => utf8_decode($datos['nombre']),
            'apellido' => utf8_decode($datos['apellido']),
            'telefono' => utf8_decode($datos['telefono']),
            'celular' => utf8_decode($datos['celular']),
            'direccion' => utf8_decode($datos['direccion']),
            'barrio' => utf8_decode($datos['barrio']),
            'fecha_registro' => date('Y-m-d H:i:s'),
            'fecha_nacimiento' => date('Y-m-d', strtotime($fecha)),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select p.*, tp.descripcion as tipo_documento, c.descripcion as ciudad, d.descripcion as departamento, d.id as id_departamento
                                    from paciente p
                                    LEFT JOIN tipo_documento tp on tp.id = p.id_tipo_documento
                                    LEFT JOIN ciudad c on c.id = p.id_ciudad
                                    LEFT JOIN departamento d on d.id = c.id_departamento
                                    where p.id = $id");
        if ($sql[0]['estado'] == 1) {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="paciente" data-rowid="paciente_" data-tabla="paciente" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="paciente" data-rowid="paciente_" data-tabla="paciente" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDatosPaciente"><i class="fa fa-edit"></i> Ver Datos / Editar </a>';
        $data = array(
            'type' => 'success',
            'id' => $id,
            'nombre' => (!empty($sql[0]['nombre'])) ? utf8_encode($sql[0]['nombre']) : '',
            'apellido' => (!empty($sql[0]['apellido'])) ? utf8_encode($sql[0]['apellido']) : '',
            'email' => (!empty($sql[0]['email'])) ? utf8_encode($sql[0]['email']) : '-',
            'documento' => (!empty($sql[0]['documento'])) ? utf8_encode($sql[0]['documento']) : '-',
            'telefono' => (!empty($sql[0]['telefono'])) ? utf8_encode($sql[0]['telefono']) : '-',
            'celular' => (!empty($sql[0]['celular'])) ? utf8_encode($sql[0]['celular']) : '-',
            'estado' => $estado,
            'accion' => $btnEditar
        );
        return $data;
    }

    public function frmAgregarFrases($datos) {
        $this->db->insert('web_frases', array(
            'frase' => utf8_decode($datos['frase']),
            'autor' => utf8_decode($datos['autor']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from web_frases where id = $id");
        if ($sql[0]['estado'] == 1) {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="frases" data-rowid="frases_" data-tabla="web_frases" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="frases" data-rowid="frases_" data-tabla="web_frases" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarFrases"><i class="fa fa-edit"></i> Editar </a>';
        $data = array(
            'type' => 'success',
            'orden' => utf8_encode($sql[0]['orden']),
            'frase' => utf8_encode($sql[0]['frase']),
            'autor' => utf8_encode($sql[0]['autor']),
            'estado' => $estado,
            'accion' => $btnEditar
        );
        return $data;
    }

    public function frmAgregarCiudad($datos) {
        $this->db->insert('ciudad', array(
            'id_departamento' => utf8_decode($datos['id_departamento']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("SELECT c.id, c.descripcion as ciudad, c.estado, d.descripcion as departamento FROM ciudad c
                                LEFT JOIN departamento d on c.id_departamento = d.id where c.id = $id");
        if ($sql[0]['estado'] == 1) {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="ciudad" data-rowid="ciudad_" data-tabla="ciudad" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="ciudad" data-rowid="ciudad_" data-tabla="ciudad" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarCiudad"><i class="fa fa-edit"></i> Editar </a>';
        $data = array(
            'type' => 'success',
            'departamento' => utf8_encode($sql[0]['departamento']),
            'ciudad' => utf8_encode($sql[0]['ciudad']),
            'estado' => $estado,
            'accion' => $btnEditar
        );
        return $data;
    }

    public function frmAgregarServicio($datos) {
        $this->db->insert('web_inicio_servicios', array(
            'servicio' => utf8_decode($datos['servicio']),
            'contenido' => utf8_decode($datos['contenido']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from web_inicio_servicios where id = $id");
        if ($sql[0]['estado'] == 1) {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="web_inicio_servicios" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="servicios" data-rowid="servicios_" data-tabla="web_inicio_servicios" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarServicios"><i class="fa fa-edit"></i> Editar </a>';
        $data = array(
            'type' => 'success',
            'orden' => utf8_encode($sql[0]['orden']),
            'servicio' => utf8_encode($sql[0]['servicio']),
            'estado' => $estado,
            'accion' => $btnEditar
        );
        return $data;
    }

    public function datosVideoInicio() {
        $sql = $this->db->select('select * from web_inicio_video where id = 1');
        return $sql[0];
    }

    public function datosInicioNosotros() {
        $sql = $this->db->select('select * from web_inicio_nosotros where id = 1');
        return $sql[0];
    }

    public function datosInicioImagenParallax() {
        $sql = $this->db->select('select * from web_inicio_parallax where id = 1');
        return $sql[0];
    }

    public function datosNathaly() {
        $sql = $this->db->select('select * from web_page_nosotros where id = 1');
        return $sql[0];
    }

    public function frmVideoInicio($datos) {
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'texto_info' => utf8_decode($datos['texto_info']),
            'texto_info2' => utf8_decode($datos['texto_info2']),
            'url_video' => utf8_decode($datos['url_video'])
        );
        $this->db->update('web_inicio_video', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se han guardado correctamente los cambios para el video del inicio.'
        );
        return $data;
    }

    public function frmInicioNosotros($datos) {
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido'])
        );
        $this->db->update('web_inicio_nosotros', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se han guardado correctamente los cambios para el contenido de Nosotros del Inicio.'
        );
        return $data;
    }

    public function frmAgregarDatoFichaCliente($datos) {
        $id_paciente = $datos['id_paciente'];
        $this->db->insert('ficha_paciente', array(
            'id_paciente' => $id_paciente,
            'fecha' => date('Y-m-d H:i:s'),
            'descripcion_consulta' => utf8_decode($datos['descripcion_consulta'])
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from ficha_paciente where id = $id");
        $div = '<div class="hr-line-dashed"></div>
                <div class="search-result">
                    <h3><a href="#">' . date('d-m-Y H:i:s', strtotime($sql[0]['fecha'])) . '</a></h3>
                    ' . utf8_encode($sql[0]['descripcion_consulta']) . '
                </div>';
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se ha agregado correctamente los datos a la ficha del paciente.',
            'content' => $div
        );
        return $data;
    }

    public function frmInicioImagenParallax($datos) {
        $update = array(
            'texto' => utf8_decode($datos['texto'])
        );
        $this->db->update('web_inicio_parallax', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se han guardado correctamente los cambios para el texto de la imagen Parallax del Inicio.'
        );
        return $data;
    }

    public function frmNosotrosTexto($datos) {
        $update = array(
            'texto' => utf8_decode($datos['texto'])
        );
        $this->db->update('web_page_nosotros', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se han guardado correctamente los cambios para el texto.'
        );
        return $data;
    }

    public function uploadImgInicioNosotros($datos) {
        $id = 1;
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('web_inicio_nosotros', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgNosotrosPagina($datos) {
        $id = 1;
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('web_page_nosotros', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgInicioParallax($datos) {
        $id = 1;
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('web_inicio_parallax', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgNosotrosCabecera($datos) {
        $id = 1;
        $update = array(
            'imagen_header' => $datos['imagen']
        );
        $this->db->update('web_page_nosotros', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function listadoDTContacto($datos) {
        $columns = array(
            0 => 'id',
            1 => 'nombre',
            2 => 'email',
            3 => 'asunto',
            4 => 'fecha',
            5 => 'visto',
            6 => 'accion',
        );
        #getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM web_contacto");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT * FROM web_contacto where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (nombre LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR email LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR asunto LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR fecha LIKE '%" . $requestData['search']['value'] . "%' )";
            #when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM web_contacto where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            if ($row['leido'] == 1) {
                $estado = '<span class="label label-primary">Leído</span>';
            } else {
                $estado = '<span class="label label-danger">No Leído</span>';
            }
            $btnEditar = '<a class="btnVerContacto pointer btn-xs" data-id="' . $id . '" data-url="modalVerContacto"><i class="fa fa-edit"></i> Ver Datos </a>';
            $nestedData = array();
            $nestedData['DT_RowId'] = 'contacto_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["nombre"]);
            $nestedData[] = utf8_encode($row["email"]);
            $nestedData[] = utf8_encode($row["asunto"]);
            $nestedData[] = date('d-m-Y H:i:s', strtotime($row["fecha"]));
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

    public function listadoDTBusqueda($datos) {
        $columns = array(
            0 => 'id',
            1 => 'busqueda',
            2 => 'cantidad',
            3 => 'fecha',
            4 => 'ip'
        );
        #getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM web_blog_busquedas");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT * FROM web_blog_busquedas where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (busqueda LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR cantidad LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR fecha LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR ip LIKE '%" . $requestData['search']['value'] . "%' )";
            #when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM web_blog_busquedas where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            $nestedData = array();
            $nestedData['DT_RowId'] = 'contacto_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["busqueda"]);
            $nestedData[] = number_format($row["cantidad"], 0, ',', '.');
            $nestedData[] = date('d-m-Y H:i:s', strtotime($row["fecha"]));
            $nestedData[] = utf8_encode($row["ip"]);
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

    public function listadoDTPacientes($datos) {
        $columns = array(
            0 => 'id',
            1 => 'nombre',
            2 => 'apellido',
            3 => 'email',
            4 => 'documento',
            5 => 'telefono',
            6 => 'celular',
            7 => 'estado',
            8 => 'accion'
        );
        #getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM paciente");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT * FROM paciente where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (nombre LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR apellido LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR email LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR documento LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR telefono LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR celular LIKE '%" . $requestData['search']['value'] . "%' )";
            #when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM paciente where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            if ($row['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="paciente" data-rowid="paciente_" data-tabla="paciente" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="paciente" data-rowid="paciente_" data-tabla="paciente" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDatosPaciente"><i class="fa fa-edit"></i> Ver Datos / Editar </a>';
            $nestedData = array();
            $nestedData['DT_RowId'] = 'paciente_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["nombre"]);
            $nestedData[] = utf8_encode($row["apellido"]);
            $nestedData[] = utf8_encode($row["email"]);
            $nestedData[] = utf8_encode($row["documento"]);
            $nestedData[] = utf8_encode($row["telefono"]);
            $nestedData[] = utf8_encode($row["celular"]);
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

    public function listadoDTMetas($datos) {
        $columns = array(
            0 => 'id',
            1 => 'pagina',
            2 => 'accion'
        );
        #getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM web_metatags");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT * FROM web_metatags where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (pagina LIKE '%" . $requestData['search']['value'] . "%' )";
            #when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM web_metatags where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarMetaTag"><i class="fa fa-edit"></i> Editar </a>';
            $nestedData = array();
            $nestedData['DT_RowId'] = 'metatag_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["pagina"]);
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

    public function listadoDTBlog($datos) {
        $columns = array(
            0 => 'id',
            1 => 'titulo',
            2 => 'imagen_thumb',
            3 => 'fecha_blog',
            4 => 'estado',
            6 => 'accion',
        );
        #getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM web_blog");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT * FROM web_blog where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (titulo LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR fecha_blog LIKE '%" . $requestData['search']['value'] . "%')";
            #when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM web_contacto where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            if ($row['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="blog" data-rowid="blog_" data-tabla="web_blog" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="blog" data-rowid="blog_" data-tabla="web_blog" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarBlogPost"><i class="fa fa-edit"></i> Editar </a>';
            $imagen = '<img class="img-responsive imgBlogTable" src="' . URL . 'public/images/blog/' . $row['imagen_thumb'] . '">';
            $nestedData = array();
            $nestedData['DT_RowId'] = 'blog_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["titulo"]);
            $nestedData[] = $imagen;
            $nestedData[] = date('d-m-Y', strtotime($row["fecha_blog"]));
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

    public function modalVerContacto($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM web_contacto where id = $id");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulario de contacto enviado por ' . utf8_encode($sql[0]['nombre']) . '</h3>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <tr>
                                <td class="text-bold">Nombre:</td>
                                <td>' . utf8_encode($sql[0]['nombre']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Email:</td>
                                <td>' . utf8_encode($sql[0]['email']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Asunto:</td>
                                <td>' . utf8_encode($sql[0]['asunto']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Mensaje:</td>
                                <td>' . utf8_encode($sql[0]['mensaje']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">IP:</td>
                                <td>' . utf8_encode($sql[0]['ip']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Fecha:</td>
                                <td>' . date('d-m-Y H:i:s', strtotime($sql[0]['fecha'])) . '</td>
                            </tr>
                        </table>
                    </div>
                </div>';
        $update = array(
            'leido' => 1
        );
        $this->db->update('web_contacto', $update, "id = $id");
        $data = array(
            'titulo' => 'Ver datos de contacto',
            'content' => $modal,
            'id' => $id,
            'row' => $this->rowDataTable('verContacto', 'web_contacto', $id)
        );
        return json_encode($data);
    }

    public function modalEditarBlogPost($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from web_blog where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarBlogPost" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Nombre" value="' . utf8_encode($sql[0]['titulo']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID video Youtube</label>
                                        <input type="text" name="url_youtube" class="form-control" placeholder="ID video Youtube" value="' . utf8_encode($sql[0]['url_youtube']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="data_1">
                                            <label class="font-normal">Fecha Publicación</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha_blog" value="' . date('d/m/Y', strtotime($sql[0]['fecha_blog'])) . '">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contenido</label>
                                        <textarea name="contenido" class="summernote">' . utf8_encode($sql[0]['contenido']) . '</textarea>
                                    </div>
                                </div>
                            </div>
                            
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                            
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                    -Formato: JPG, PNG<br>
                                    -Dimensión: Hasta 1200 x 800px<br>
                                    -Tamaño: 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileTestimonio" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgBlog" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileTestimonio").html5fileupload({
                                    data:{id:' . $id . '},
                                    onAfterStartSuccess: function(response) {
                                        $("#imgTestimonio" + response.id).html(response.content);
                                        $("#testimonios_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgTestimonio' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/blog/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Entrada del Blog',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDatosPaciente($datos) {
        $id = $datos['id'];
        $sqlFicha = $this->db->select("SELECT * FROM `ficha_paciente` WHERE id_paciente = $id ORDER BY fecha DESC;");
        $sqlPaciente = $this->db->select("select p.*, tp.descripcion as tipo_documento, c.descripcion as ciudad, d.descripcion as departamento, d.id as id_departamento
                                        from paciente p
                                        LEFT JOIN tipo_documento tp on tp.id = p.id_tipo_documento
                                        LEFT JOIN ciudad c on c.id = p.id_ciudad
                                        LEFT JOIN departamento d on d.id = c.id_departamento
                                        where p.id = $id");
        $sqlTipoDocumento = $this->db->select("select * from tipo_documento where estado = 1");
        $sqlDepartamento = $this->db->select("Select * from departamento where estado = 1");
        $sqlCiudad = $this->db->select("Select * from ciudad where id_departamento = " . $sqlPaciente[0]['id_departamento'] . " and estado = 1");
        $checked = '';
        if ($sqlPaciente[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos del paciente</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"> <i class="fa fa-user" aria-hidden="true"></i> Ficha</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-info-circle" aria-hidden="true"></i> Datos</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-3 pull-right">
                                                    <button type="button" class="btn btn-w-m btn-primary btnAgregarDatoFichaPaciente"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Item Ficha</button>
                                                </div>
                                                <div class="col-md-12 divAgregarFichaPaciente" style="display:none;">
                                                    <form class="frmAgregarDatoFichaCliente" method="POST">
                                                        <input type="hidden" name="id_paciente" value="' . $id . '">
                                                        <div class="form-group">
                                                            <label>Contenido</label>
                                                            <textarea name="contenido" class="summernote"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-w-m btn-primary btn-block btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar Datos</button>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">';
        $modal .= '                             <div id="overlay"><div><i class="fa fa-circle-o-notch fa-spin" style="font-size:34px"></i></div></div>
                                                <div class="page-content">
                                                    <div id="pagination-result">
                                                    </div>
                                                </div>';
        $modal .= '                         </div>
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                        <div class="panel-body">
                                            <form method="POST" class="frmEditarDatosPaciente">
                                                <input type="hidden" name="id" value="' . $sqlPaciente[0]['id'] . '">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="' . utf8_encode($sqlPaciente[0]['nombre']) . '" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Apellido</label>
                                                            <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="' . utf8_encode($sqlPaciente[0]['apellido']) . '" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control" placeholder="Email" value="' . utf8_encode($sqlPaciente[0]['email']) . '" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tipo Documento</label>
                                                            <select class="form-control m-b" name="id_tipo_documento"> 
                                                                <option value="">Tipo de Documento</option>';
        foreach ($sqlTipoDocumento as $item) {
            $selected = ($item['id'] == $sqlPaciente[0]['id_tipo_documento']) ? 'selected' : '';
            $modal .= '                 <option value="' . $item['id'] . '" ' . $selected . '>' . utf8_encode($item['descripcion']) . '</option>';
        }
        $modal .= '                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Documento</label>
                                                            <input type="text" name="documento" class="form-control" placeholder="Nro. Documento" value="' . utf8_encode($sqlPaciente[0]['documento']) . '" required>
                                                        </div>
                                                    </div>
                                                </div><!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Teléfono</label>
                                                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono" value="' . utf8_encode($sqlPaciente[0]['telefono']) . '">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Celular</label>
                                                            <input type="text" name="celular" class="form-control" placeholder="Celular" value="' . utf8_encode($sqlPaciente[0]['celular']) . '">
                                                        </div>
                                                    </div>
                                                </div><!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Dirección</label>
                                                            <input type="text" name="direccion" class="form-control" placeholder="Dirección" value="' . utf8_encode($sqlPaciente[0]['direccion']) . '">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Barrio</label>
                                                            <input type="text" name="barrio" class="form-control" placeholder="Barrio" value="' . utf8_encode($sqlPaciente[0]['barrio']) . '">
                                                        </div>
                                                    </div>
                                                </div><!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Departamento</label>
                                                            <select class="form-control m-b selectDepartamento" name="id_departamento"> 
                                                                <option value="">Departamento</option>';
        foreach ($sqlDepartamento as $item) {
            $selected = ($item['id'] == $sqlPaciente[0]['id_departamento']) ? 'selected' : '';
            $modal .= '                 <option value="' . $item['id'] . '" ' . $selected . '>' . utf8_encode($item['descripcion']) . '</option>';
        }
        $modal .= '                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Ciudad</label>
                                                            <select class="form-control m-b selectCiudad" name="id_ciudad"> 
                                                                <option value="">Ciudad</option>';
        foreach ($sqlCiudad as $item) {
            $selected = ($item['id'] == $sqlPaciente[0]['id_ciudad']) ? 'selected' : '';
            $modal .= '                 <option value="' . $item['id'] . '" ' . $selected . '>' . utf8_encode($item['descripcion']) . '</option>';
        }
        $modal .= '                </select>
                                                        </div>
                                                    </div>
                                                </div><!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group" id="data_1">
                                                            <label class="font-normal">Fecha Nacimiento</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha_nacimiento" value="' . date('d/m/Y', strtotime($sqlPaciente[0]['fecha_nacimiento'])) . '">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                                    </div>
                                                </div><!--/row-->
                                                <button type="submit" class="btn btn-w-m btn-primary btn-block btn-lg">Modificar Datos</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        $data = array(
            'id_paciente' => $id,
            'titulo' => 'Datos del Paciente',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalAgregarBlogPost() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Contenido al Blog</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . 'admin/frmAgregarBlogPost" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID video Youtube</label>
                                        <input type="text" name="url_youtube" class="form-control" placeholder="ID video Youtube" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="data_1">
                                            <label class="font-normal">Fecha Publicación</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha_blog" value="">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contenido</label>
                                        <textarea name="contenido" class="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3>Imagen</h3>
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: 1280 x 720<br>
                                        -Tamaño: Hasta 2MB<br>
                                    <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                </div>
                                <div class="html5fileupload fileAgregarBlog" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                    <input type="file" name="file_archivo" />
                                </div>
                                <script>
                                    $(".html5fileupload.fileAgregarBlog").html5fileupload();
                                </script>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Blog</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Entrada del Blog',
            'content' => $modal
        );
        return $data;
    }

    public function modalAgregarPaciente() {
        $sqlTipoDocumento = $this->db->select("select * from tipo_documento where estado = 1");
        $sqlDepartamento = $this->db->select("Select * from departamento where estado = 1");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Paciente</h3>
                    </div>
                    <div class="row">
                        <form method="POST" class="frmAgregarDatosPaciente">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Apellido</label>
                                                            <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control" placeholder="Email" value="" required>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                    
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tipo Documento</label>
                                                            <select class="form-control m-b" name="id_tipo_documento"> 
                                                                <option value="">Tipo de Documento</option>';
        foreach ($sqlTipoDocumento as $item) {
            $modal .= '                 <option value="' . $item['id'] . '">' . utf8_encode($item['descripcion']) . '</option>';
        }
        $modal .= '                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Documento</label>
                                                            <input type="text" name="documento" class="form-control" placeholder="Nro. Documento" value="">
                                                        </div>
                                                    </div>
                                                </div><!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Teléfono</label>
                                                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Celular</label>
                                                            <input type="text" name="celular" class="form-control" placeholder="Celular" value="">
                                                        </div>
                                                    </div>
                                                </div><!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Dirección</label>
                                                            <input type="text" name="direccion" class="form-control" placeholder="Dirección" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Barrio</label>
                                                            <input type="text" name="barrio" class="form-control" placeholder="Barrio" value="">
                                                        </div>
                                                    </div>
                                                </div><!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Departamento</label>
                                                            <select class="form-control m-b selectDepartamento" name="id_departamento"> 
                                                                <option value="">Departamento</option>';
        foreach ($sqlDepartamento as $item) {
            $modal .= '                 <option value="' . $item['id'] . '">' . utf8_encode($item['descripcion']) . '</option>';
        }
        $modal .= '                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Ciudad</label>
                                                            <select class="form-control m-b selectCiudad" name="id_ciudad"> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group" id="data_1">
                                                            <label class="font-normal">Fecha Nacimiento</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha_nacimiento" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                                    </div>
                                                </div><!--/row-->
                                                <button type="submit" class="btn btn-w-m btn-primary btn-block btn-lg">Agregar Paciente</button>
                                            </form>                        
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                        $("#data_1 .input-group.date").datepicker({
                            todayBtn: "linked",
                            keyboardNavigation: false,
                            forceParse: false,
                            calendarWeeks: true,
                            autoclose: true,
                            format: "dd/mm/yyyy",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Paciente',
            'content' => $modal
        );
        return $data;
    }

    public function listadoDTUsuarios() {
        $sql = $this->db->select("SELECT wa.id, wa.nombre, wa.email, wr.descripcion as rol, wa.estado
                                FROM admin_usuario wa
                                LEFT JOIN admin_rol wr on wr.id = wa.id_rol");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="admin_usuario" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="admin_usuario" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTUsuario"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "usuarios_$id",
                'nombre' => utf8_encode($item['nombre']),
                'email' => utf8_encode($item['email']),
                'rol' => utf8_encode($item['rol']),
                'estado' => $estado,
                'accion' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function modalEditarDTUsuario($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT wa.nombre, wa.email, wr.descripcion as rol, wa.estado, wr.id as id_rol
                                FROM admin_usuario wa
                                LEFT JOIN admin_rol wr on wr.id = wa.id_rol where wa.id = $id");
        $sqlRoles = $this->db->select("select * from admin_rol where estado = 1");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarUsuario" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="' . utf8_encode($sql[0]['nombre']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="' . utf8_encode($sql[0]['email']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select class="form-control m-b" name="id_rol" required> 
                                        <option value="">Seleccione un Rol</option>';
        foreach ($sqlRoles as $item) {
            $selected = ($item['id'] == $sql[0]['id_rol']) ? 'selected' : '';
            $modal .= '                 <option value="' . $item['id'] . '" ' . $selected . '>' . $item['descripcion'] . '</option>';
        }
        $modal .= '                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Solamente complete el campo contraseña cuando desee modificar la misma. Si la deja vacia no se modificará.
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" value="">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Usuario</button>
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
            'titulo' => 'Editar Datos del Usuario',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function frmEditarUsuario($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $contrasena = $datos['contrasena'];
        if (!empty($contrasena)) {
            $update = array(
                'nombre' => utf8_decode($datos['nombre']),
                'email' => utf8_decode($datos['email']),
                'id_rol' => utf8_decode($datos['id_rol']),
                'contrasena' => Hash::create('sha256', $contrasena, HASH_PASSWORD_KEY),
                'estado' => $estado
            );
        } else {
            $update = array(
                'nombre' => utf8_decode($datos['nombre']),
                'email' => utf8_decode($datos['email']),
                'id_rol' => utf8_decode($datos['id_rol']),
                'estado' => $estado
            );
        }
        $this->db->update('admin_usuario', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('usuarios', 'admin_usuario', $id),
            'id' => $id
        );
        return $data;
    }

    public function modalAgregarUsuario() {
        $sqlRoles = $this->db->select("select * from admin_rol where estado = 1");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . 'admin/frmAgregarUsuario" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select class="form-control m-b" name="id_rol" required> 
                                        <option value="">Seleccione un Rol</option>';
        foreach ($sqlRoles as $item) {
            $modal .= '                 <option value="' . $item['id'] . '">' . $item['descripcion'] . '</option>';
        }
        $modal .= '                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" value="" required>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Usuario</button>
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
            'titulo' => 'Agregar Usuario',
            'content' => $modal
        );
        return $data;
    }

    public function frmAgregarUsuario($datos) {
        $this->db->insert('admin_usuario', array(
            'id_rol' => utf8_decode($datos['id_rol']),
            'email' => utf8_decode($datos['email']),
            'contrasena' => Hash::create('sha256', utf8_decode($datos['contrasena']), HASH_PASSWORD_KEY),
            'nombre' => utf8_decode($datos['nombre']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function getresult($idPaciente, $pagina) {
        if (!empty($pagina)) {
            $page = $pagina;
        } else {
            $page = 1;
        }
        $setLimit = CANT_FICHA;
        $pageLimit = ($setLimit * $page) - $setLimit;
        $sql = $this->db->select("select * from ficha_paciente
                                where id_paciente = $idPaciente
                                ORDER BY fecha desc
                                LIMIT $pageLimit, $setLimit");
        $condicion = "FROM ficha_paciente WHERE 1=1";

        $div = '';
        if (!empty($sql)) {
            foreach ($sql as $item) {
                $fecha = date('d-m-Y H:i:s', strtotime($item['fecha']));
                $div .= '                         <div class="hr-line-dashed"></div>
                                                <div class="search-result">
                                                    <h3><a href="#">' . $fecha . '</a></h3>
                                                    ' . utf8_encode($item['descripcion_consulta']) . '
                                                </div>';
            }
        } else {
            $div .= '<p>&nbsp;</p><div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                El paciente seleccionado aún no posee ningún registro en su ficha.
                            </div>';
        }
        $div .= $this->helper->mostrarPaginador($setLimit, $page, 'ficha_paciente', 'admin/getresult/' . $idPaciente, $condicion, TRUE);
        return $div;
    }

    public function frmEditarDatosPaciente($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }

        $fechaNacimiento = (!empty($datos['fecha_nacimiento'])) ? date('Y-m-d', strtotime($datos['fecha_nacimiento'])) : NULL;
        $update = array(
            'nombre' => utf8_decode($datos['nombre']),
            'apellido' => utf8_decode($datos['apellido']),
            'id_tipo_documento' => utf8_decode($datos['id_tipo_documento']),
            'documento' => utf8_decode($datos['documento']),
            'telefono' => utf8_decode($datos['telefono']),
            'celular' => utf8_decode($datos['celular']),
            'direccion' => utf8_decode($datos['direccion']),
            'barrio' => utf8_decode($datos['barrio']),
            'id_ciudad' => utf8_decode($datos['id_ciudad']),
            'fecha_nacimiento' => $fechaNacimiento,
            'estado' => $estado
        );
        $this->db->update('paciente', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('paciente', 'paciente', $id),
            'id' => $id
        );
        return $data;
    }

    public function selectLoadCiudad($datos) {
        $id = $datos['id_departamento'];
        $sql = $this->db->select("select id, descripcion from ciudad where id_departamento = $id");
        $option = '';
        foreach ($sql as $item) {
            $option .= '<option value="' . $item['id'] . '">' . utf8_encode($item['descripcion']) . '</option>';
        }
        return $option;
    }

    public function getRedesTable() {
        $sql = $this->db->select("select * from web_redes");
        return $sql;
    }

    public function modalEditarRedes($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM web_redes where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarRedes" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre Red Social</label>
                                    <input type="text" name="descripcion" class="form-control" placeholder="Nombre Red Social" value="' . utf8_encode($sql[0]['descripcion']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enlace</label>
                                    <input type="text" name="enlace" class="form-control" placeholder="Enlace" value="' . utf8_encode($sql[0]['enlace']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Red Social</button>
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
            'titulo' => 'Editar Red Social',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function frmEditarRedes($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'descripcion' => utf8_decode($datos['descripcion']),
            'enlace' => utf8_decode($datos['enlace']),
            'estado' => $estado
        );
        $this->db->update('web_redes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('redes', 'web_redes', $id),
            'id' => $id
        );
        return $data;
    }

    public function uploadImgLogoCabacera($datos) {
        $id = 1;
        $update = array(
            'logo' => $datos['imagen']
        );
        $this->db->update('web_datos', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images//' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgLogoPie($datos) {
        $id = 1;
        $update = array(
            'logo_2' => $datos['imagen']
        );
        $this->db->update('web_datos', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images//' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function datosDirecciones() {
        $sql = $this->db->select("select * from web_datos where id = 1");
        return $sql[0];
    }

    public function frmEditarDirecciones($datos) {
        $id = 1;
        $update = array(
            'direccion' => utf8_decode($datos['direccion']),
            'ciudad' => utf8_decode($datos['ciudad']),
            'email' => utf8_decode($datos['email']),
            'telefono' => utf8_decode($datos['telefono']),
            'telefono_2' => utf8_decode($datos['telefono_2']),
            'latitud' => utf8_decode($datos['latitud']),
            'longitud' => utf8_decode($datos['longitud']),
            'tipo_mapa' => utf8_decode($datos['tipo_mapa']),
            'zoommap' => utf8_decode($datos['zoommap']),
            'nombre' => utf8_decode($datos['nombre'])
        );
        $row = $this->db->update('web_datos', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se han actualizado correctamente los datos',
            'id' => $id
        );
        return $data;
    }

}
