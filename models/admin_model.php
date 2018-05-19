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

    public function frmAddSliderImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('web_inicio_slider', $update, "id = $id");
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

}
