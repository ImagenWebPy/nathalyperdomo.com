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
        $this->view->title = 'Ciudades';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/html5fileupload/html5fileupload.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/ciudades/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function inicio() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Inicio';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/html5fileupload/html5fileupload.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/contenido/inicio');
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

    public function listadoDTSlider() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTSlider();
        echo $data;
    }

    public function modalEditarDTSlider() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTSlider($data);
        echo $datos;
    }

    public function frmEditarSlider() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'texto_1' => (!empty($_POST['texto_1'])) ? $this->helper->cleanInput($_POST['texto_1']) : NULL,
            'texto_2' => (!empty($_POST['texto_2'])) ? $this->helper->cleanInput($_POST['texto_2']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'principal' => (!empty($_POST['principal'])) ? $this->helper->cleanInput($_POST['principal']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarSlider($datos);
        echo json_encode($data);
    }

    public function modalAgregarSlider() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarSlider();
        echo json_encode($datos);
    }

    public function frmAgregarSlider() {
        if (!empty($_POST)) {
            $principal = $_POST['principal'];
            $data = array(
                'texto_1' => (!empty($_POST['texto_1'])) ? $this->helper->cleanInput($_POST['texto_1']) : NULL,
                'texto_2' => (!empty($_POST['texto_2'])) ? $this->helper->cleanInput($_POST['texto_2']) : NULL,
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'principal' => (!empty($principal)) ? $this->helper->cleanInput($principal) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $_POST['estado'] : 0,
            );
            $idPost = $this->model->frmAgregarSlider($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/slider/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                if ($principal != 1) {
                    $ancho = 1920;
                    $alto = 1080;
                } else {
                    $ancho = 310;
                    $alto = 649;
                }
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddSliderImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente el slider'
            ));
        }
        header('Location:' . URL . 'admin/slider/');
    }

    public function uploadImgSlider() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            #verificamos si la imagen es la principal
            $sql = $this->db->select("select principal from web_inicio_slider where id = $idPost");
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/slider/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdir . $filename;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filename;
            if ($sql[0]['principal'] != 1) {
                $ancho = 1920;
                $alto = 1080;
            } else {
                $ancho = 310;
                $alto = 649;
            }
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgSlider($data);
            echo json_encode($response);
        }
    }

    public function listadoDTCaracteristicas() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTCaracteristicas();
        echo $data;
    }

    public function modalEditarCaracteristicas() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarCaracteristicas($data);
        echo $datos;
    }

    public function frmEditarCaracteristicas() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'titulo' => $this->helper->cleanInput($_POST['titulo']),
            'contenido' => $this->helper->cleanInput($_POST['contenido']),
            'icon' => $this->helper->cleanInput($_POST['icon']),
            'orden' => $this->helper->cleanInput($_POST['orden']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarCaracteristicas($datos);
        echo json_encode($data);
    }
    
    public function modalAgregarCaracteristicas() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarCaracteristicas();
        echo json_encode($datos);
    }
    
    public function frmAgregarCaracteristicas(){
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'titulo' => $this->helper->cleanInput($_POST['titulo']),
            'contenido' => $this->helper->cleanInput($_POST['contenido']),
            'icon' => $this->helper->cleanInput($_POST['icon']),
            'orden' => $this->helper->cleanInput($_POST['orden']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarCaracteristicas($datos);
        echo json_encode($data);
    }
}
