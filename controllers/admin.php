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
        $this->view->datosVideoInicio = $this->model->datosVideoInicio();
        $this->view->datosInicioNosotros = $this->model->datosInicioNosotros();
        $this->view->datosInicioImagenParallax = $this->model->datosInicioImagenParallax();
        $this->view->title = 'Inicio';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css", "css/plugins/summernote/summernote.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/html5fileupload/html5fileupload.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/contenido/inicio');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function blog() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Blog';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css", "css/plugins/summernote/summernote.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/html5fileupload/html5fileupload.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/datapicker/bootstrap-datepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/blog/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function pacientes() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Pacientes';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css", "css/plugins/summernote/summernote.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->publicHeader_js = array("js/ajax-pagination");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/html5fileupload/html5fileupload.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/datapicker/bootstrap-datepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/pacientes/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function contacto() {
        $this->view->helper = $this->helper;
        $this->view->datosVideoInicio = $this->model->datosVideoInicio();
        $this->view->datosInicioNosotros = $this->model->datosInicioNosotros();
        $this->view->datosInicioImagenParallax = $this->model->datosInicioImagenParallax();
        $this->view->title = 'Contacto';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/contacto/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function nathaly() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Nathaly';
        $this->view->datosNathaly = $this->model->datosNathaly();
        $this->view->public_css = array("css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css", "css/plugins/summernote/summernote.css");
        $this->view->public_js = array("js/plugins/html5fileupload/html5fileupload.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/nathaly/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function listadoDTDepartamentos() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTDepartamentos($_REQUEST);
        echo $data;
    }

    public function listadoDTCiudades() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTCiudades($_REQUEST);
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

    public function modalEditarCiudad() {
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $data = $this->model->modalEditarCiudad($datos);
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

    public function frmEditarCiudad() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'id_departamento' => $this->helper->cleanInput($_POST['id_departamento']),
            'descripcion' => $this->helper->cleanInput($_POST['descripcion']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $data = $this->model->frmEditarCiudad($datos);
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

    public function modalAgregarBlogPost() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarBlogPost();
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

    public function frmAgregarBlogPost() {
        if (!empty($_POST)) {
            $data = array(
                'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
                'url_youtube' => (!empty($_POST['url_youtube'])) ? $this->helper->cleanInput($_POST['url_youtube']) : NULL,
                'fecha_blog' => (!empty($_POST['fecha_blog'])) ? $this->helper->cleanInput($_POST['fecha_blog']) : NULL,
                'contenido' => (!empty($_POST['contenido'])) ? $_POST['contenido'] : NULL,
                'estado' => (!empty($_POST['estado'])) ? $_POST['estado'] : 0,
            );
            $idPost = $this->model->frmAgregarBlogPost($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/blog/';
                $serverdir = $dir;
                #IMAGEN
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
                $imagen_final = $fname;
                $ancho = 1280;
                $alto = 720;

                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);

                #IMAGEN THUMB
                $newname_thumb = $idPost . '_thumb-' . $_FILES['file_archivo']['name'];
                $fname_thumb = $this->helper->cleanUrl($newname_thumb);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname_thumb, 'w');
                fwrite($handle, $contents);
                fclose($handle);

                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen_thumb = $serverdir . $fname_thumb;
                $imagen_final_thumb = $fname_thumb;
                $ancho_thumb = 330;
                $alto_thumb = 380;

                $this->helper->redimensionar($imagen_thumb, $imagen_final_thumb, $ancho_thumb, $alto_thumb, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagen' => $fname,
                    'imagen_thumb' => $fname_thumb
                );
                $this->model->frmAddBlogImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente el contenido'
            ));
        }
        header('Location:' . URL . 'admin/blog/');
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

    public function listadoDTServicios() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTServicios();
        echo $data;
    }

    public function listadoDTFrases() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTFrases();
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

    public function modalEditarFrases() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarFrases($data);
        echo $datos;
    }

    public function modalEditarServicios() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarServicios($data);
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

    public function frmEditarFrases() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'autor' => $this->helper->cleanInput($_POST['autor']),
            'frase' => $this->helper->cleanInput($_POST['frase']),
            'orden' => $this->helper->cleanInput($_POST['orden']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarFrases($datos);
        echo json_encode($data);
    }

    public function frmEditarBlogPost() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'titulo' => $this->helper->cleanInput($_POST['titulo']),
            'url_youtube' => $this->helper->cleanInput($_POST['url_youtube']),
            'contenido' => $_POST['contenido'],
            'fecha_blog' => $this->helper->cleanInput($_POST['fecha_blog']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarBlogPost($datos);
        echo json_encode($data);
    }

    public function frmEditarServicios() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'servicio' => $this->helper->cleanInput($_POST['servicio']),
            'contenido' => $this->helper->cleanInput($_POST['contenido']),
            'orden' => $this->helper->cleanInput($_POST['orden']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarServicios($datos);
        echo json_encode($data);
    }

    public function modalAgregarCaracteristicas() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarCaracteristicas();
        echo json_encode($datos);
    }

    public function modalAgregarFrases() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarFrases();
        echo json_encode($datos);
    }

    public function modalAgregarCiudad() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarCiudad();
        echo json_encode($datos);
    }

    public function modalAgregarServicio() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarServicio();
        echo json_encode($datos);
    }

    public function frmAgregarCaracteristicas() {
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

    public function frmAgregarFrases() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'autor' => $this->helper->cleanInput($_POST['autor']),
            'frase' => $this->helper->cleanInput($_POST['frase']),
            'orden' => $this->helper->cleanInput($_POST['orden']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarFrases($datos);
        echo json_encode($data);
    }

    public function frmAgregarCiudad() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id_departamento' => $this->helper->cleanInput($_POST['id_departamento']),
            'descripcion' => $this->helper->cleanInput($_POST['descripcion']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarCiudad($datos);
        echo json_encode($data);
    }

    public function frmAgregarServicio() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'servicio' => $this->helper->cleanInput($_POST['servicio']),
            'contenido' => $this->helper->cleanInput($_POST['contenido']),
            'orden' => $this->helper->cleanInput($_POST['orden']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarServicio($datos);
        echo json_encode($data);
    }

    public function frmVideoInicio() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'titulo' => $this->helper->cleanInput($_POST['titulo']),
            'texto_info' => $this->helper->cleanInput($_POST['texto_info']),
            'texto_info2' => $this->helper->cleanInput($_POST['texto_info2']),
            'url_video' => $_POST['url_video'],
        );
        $data = $this->model->frmVideoInicio($datos);
        echo json_encode($data);
    }

    public function frmInicioNosotros() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'titulo' => $this->helper->cleanInput($_POST['titulo']),
            'contenido' => $_POST['contenido']
        );
        $data = $this->model->frmInicioNosotros($datos);
        echo json_encode($data);
    }

    public function frmInicioImagenParallax() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'texto' => $this->helper->cleanInput($_POST['texto'])
        );
        $data = $this->model->frmInicioImagenParallax($datos);
        echo json_encode($data);
    }

    public function frmNosotrosTexto() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'texto' => $_POST['texto']
        );
        $data = $this->model->frmNosotrosTexto($datos);
        echo json_encode($data);
    }

    public function uploadImgInicioNosotros() {
        if (!empty($_POST)) {
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgInicioNosotros($data);
            echo json_encode($response);
        }
    }

    public function uploadImgNosotrosPagina() {
        if (!empty($_POST)) {
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgNosotrosPagina($data);
            echo json_encode($response);
        }
    }

    public function uploadImgInicioParallax() {
        if (!empty($_POST)) {
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl('index-image-section');
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
            $ancho = 1920;
            $alto = 850;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgInicioParallax($data);
            echo json_encode($response);
        }
    }

    public function uploadImgNosotrosCabecera() {
        if (!empty($_POST)) {
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl('aboutus-header');
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
            $ancho = 1920;
            $alto = 1250;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgNosotrosCabecera($data);
            echo json_encode($response);
        }
    }

    public function listadoDTContacto() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTContacto($_REQUEST);
        echo $data;
    }

    public function listadoDTPacientes() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTPacientes($_REQUEST);
        echo $data;
    }

    public function listadoDTBlog() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTBlog($_REQUEST);
        echo $data;
    }

    public function modalVerContacto() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalVerContacto($data);
        echo $datos;
    }

    public function modalEditarBlogPost() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarBlogPost($data);
        echo $datos;
    }

    public function usuarios() {
        $this->view->title = 'Usuarios';
        #cargamos las librerias extras
        $this->view->helper = new Helper();
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/dataTables/dataTables.rowReorder.min.js", "js/plugins/html5fileupload/html5fileupload.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/pdfobject/pdfobject.min.js", "js/plugins/html5fileupload/html5fileupload.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/datapicker/bootstrap-datepicker.js", "js/plugins/input-mask/jquery.inputmask.js", "js/plugins/input-mask/jquery.inputmask.numeric.extensions.js", "js/plugins/datapicker/locales/bootstrap-datepicker.es.min.js");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/usuarios/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function listadoDTUsuarios() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTUsuarios();
        echo $data;
    }

    public function modalEditarDTUsuario() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTUsuario($data);
        echo $datos;
    }

    public function modalEditarDatosPaciente() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDatosPaciente($data);
        echo $datos;
    }

    public function frmEditarUsuario() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'nombre' => $this->helper->cleanInput($_POST['nombre']),
            'email' => $this->helper->cleanInput($_POST['email']),
            'id_rol' => $this->helper->cleanInput($_POST['id_rol']),
            'contrasena' => (!empty($_POST['contrasena'])) ? $this->helper->cleanInput($_POST['contrasena']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $data = $this->model->frmEditarUsuario($datos);
        echo json_encode($data);
    }

    public function modalAgregarUsuario() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarUsuario();
        echo json_encode($datos);
    }

    public function frmAgregarUsuario() {
        if (!empty($_POST)) {
            $data = array(
                'nombre' => (!empty($_POST['nombre'])) ? $this->helper->cleanInput($_POST['nombre']) : NULL,
                'email' => (!empty($_POST['email'])) ? $this->helper->cleanInput($_POST['email']) : NULL,
                'id_rol' => (!empty($_POST['id_rol'])) ? $this->helper->cleanInput($_POST['id_rol']) : NULL,
                'contrasena' => (!empty($_POST['contrasena'])) ? $this->helper->cleanInput($_POST['contrasena']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $_POST['estado'] : 0,
            );
            $id = $this->model->frmAgregarUsuario($data);
            if (!empty($id)) {
                Session::set('message', array(
                    'type' => 'success',
                    'mensaje' => 'Se ha agregado correctamente el usuario'
                ));
            } else {
                Session::set('message', array(
                    'type' => 'error',
                    'mensaje' => 'Lo sentimos, ha ocurrido un error inesperado.'
                ));
            }
        }
        header('Location:' . URL . 'admin/usuarios/');
    }

    public function getresult() {
        $url = $this->helper->getUrl();
        $idPaciente = $url[2];
        if (!empty($url[3])) {
            $pagina = $url[3];
        } else {
            $pagina = 1;
        }
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->getresult($idPaciente,$pagina);
        echo json_encode($datos);
    }

}
