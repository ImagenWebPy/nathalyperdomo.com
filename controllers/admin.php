<?php

class Admin extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index() {

        $this->view->title = TITLE . 'Inicio';
        $this->view->render('admin/header');
        $this->view->render('admin/index/index');
        $this->view->render('admin/footer');
    }

    public function turnos() {

        $this->view->title = TITLE . 'Turnos';

        $this->view->public_css = array("css/plugins/fullcalendar/fullcalendar.css", "css/plugins/chosen/bootstrap-chosen.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->publicHeader_js = array("js/plugins/fullcalendar/moment.min.js", "js/plugins/fullcalendar/fullcalendar.min.js");
        $this->view->public_js = array("js/plugins/chosen/chosen.jquery.js", "js/plugins/datapicker/bootstrap-datepicker.js");

        $this->view->render('admin/header');
        $this->view->render('admin/consultorio/turnos');
        $this->view->render('admin/footer');
    }

    public function ciudades() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Ciudadess';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/html5fileupload/html5fileupload.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/ciudades/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function listadoDTDepartamentos() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTDepartamentos($_REQUEST);
        echo $data;
    }

    public function agregarNuevoPaciente() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->agregarNuevoPaciente();
        echo json_encode($data);
    }

    public function cargarSelectCiudad() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id_departamento' => $this->helper->cleanInput($_POST['id_departamento'])
        );
        $data = $this->model->cargarSelectCiudad($datos);
        echo json_encode($data);
    }

    public function frmAgregarNuevoPaciente() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id_tipo_documento' => $this->helper->cleanInput($_POST['tipo_documento']),
            'id_ciudad' => $this->helper->cleanInput($_POST['ciudad']),
            'documento' => $this->helper->cleanInput($_POST['documento']),
            'email' => $this->helper->cleanInput($_POST['email']),
            'nombre' => $this->helper->cleanInput($_POST['nombre']),
            'apellido' => $this->helper->cleanInput($_POST['apellido']),
            'telefono' => $this->helper->cleanInput($_POST['telefono']),
            'celular' => $this->helper->cleanInput($_POST['celular']),
            'direccion' => $this->helper->cleanInput($_POST['direccion']),
            'barrio' => $this->helper->cleanInput($_POST['barrio']),
            'fecha_registro' => date('Y-m-d'),
            'fecha_nacimiento' => $this->helper->cleanInput($_POST['fecha_nacimiento']),
            'estado' => 1
        );
        $data = $this->model->frmAgregarNuevoPaciente($datos);
        echo json_encode($data);
    }

    public function frmAgregarTurnoPaciente() {
        header('Content-type: application/json; charset=utf-8');
        $fecha = (!empty($_POST['fecha'])) ? str_replace('/', '-', $_POST['fecha']) : NULL;
        if ($fecha != NULL) {
            $fecha = date('Y-m-d', strtotime($fecha));
            $fecha_inicio = $fecha . ' ' . $_POST['hora_desde'] . ':00';
            $fecha_hasta = $fecha . ' ' . $_POST['hora_hasta'] . ':00';
        } else {
            $fecha_inicio = (!empty($_POST['fecha_hora_desde'])) ? $_POST['fecha_hora_desde'] : NULL;
            $fecha_hasta = (!empty($_POST['fecha_hora_hasta'])) ? $_POST['fecha_hora_hasta'] : NULL;
        }
        $datos = array(
            'id_paciente' => $this->helper->cleanInput($_POST['paciente']),
            'title' => $this->helper->cleanInput($_POST['motivo']),
            'descripcion' => $this->helper->cleanInput($_POST['observaciones']),
            'start' => $fecha_inicio,
            'end' => $fecha_hasta
        );
        $data = $this->model->frmAgregarTurnoPaciente($datos);
        echo json_encode($data);
    }

    public function loadFullCalendar() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'start' => $_GET['start'],
            'end' => $_GET['end'],
        );
        $data = $this->model->loadFullCalendar($datos);
        echo json_encode($data);
    }

    public function update_turno() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $_POST['id'],
            'start' => $_POST['start'],
            'end' => $_POST['end'],
        );
        $data = $this->model->update_turno($datos);
        echo json_encode($data);
    }

    public function eliminar_turno() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $_POST['id'],
        );
        $data = $this->model->eliminar_turno($datos);
        echo json_encode($data);
    }

    public function cambiarEstado() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'tabla' => $this->helper->cleanInput($_POST['tabla']),
            'campo' => $this->helper->cleanInput($_POST['campo']),
            'seccion' => $this->helper->cleanInput($_POST['seccion']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->cambiarEstado($datos);
        echo json_encode($data);
    }

    public function modal_editar_departamento() {
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $data = $this->model->modal_editar_departamento($datos);
        echo json_encode($data);
    }

    public function frmEditarDepartamento() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'descripcion' => $this->helper->cleanInput($_POST['descripcion']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $data = $this->model->frmEditarDepartamento($datos);
        echo json_encode($data);
    }

}
