<?php

class Admin_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function agregarNuevoPaciente() {
        $sqlTipoDocumento = $this->db->select("select * from tipo_documento where estado = 1");
        $modal = '<div class="row">
                    <form id="frmAgregarNuevoPaciente" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipo de Documento</label>
                                    <select name="tipo_documento" class="form-control chosen-select">
                                        <option value="">Seleccione un Tipo de Documento</value>';
            foreach ($sqlTipoDocumento as $tipo) {
                $modal .= '              <option value="' . $tipo['id'] . '">' . utf8_encode($tipo['descripcion']) . '</value>';
            }
            $modal .= '              </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Número Documento</label>
                                <input type="text" class="form-control" name="documento">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departamento</label>
                                    <select name="departamento" class="form-control chosen-select">
                                        <option value="">Seleccione un Departamento</value>';
            foreach ($sqlTipoDocumento as $tipo) {
                $modal .= '              <option value="' . $tipo['id'] . '">' . utf8_encode($tipo['descripcion']) . '</value>';
            }
            $modal .= '              </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <select name="ciudad" class="form-control chosen-select">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>';
        $data = array(
            'type' => 'success',
            'titulo' => 'Agregar Paciente',
            'contenido' => $modal
        );
        return $data;
    }

}
