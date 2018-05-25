<?php

class Contacto_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function frmContacto($datos) {
        $webData = $this->helper->web_datos();
        $email = $webData['email'];
        $this->db->insert('web_contacto', array(
            'nombre' => utf8_decode($datos['nombre']),
            'email' => $datos['email'],
            'asunto' => utf8_decode($datos['asunto']),
            'mensaje' => utf8_decode($datos['mensaje']),
            'ip' => $this->helper->getReal_ip(),
            'fecha' => date('Y-m-d H:i:s'),
        ));
        $asunto = 'Formulario de Contacto';
        $message = "Este mensaje fue enviado por " . $datos['nombre'] . chr(10) . chr(13);
        $message .= "Desde la sgte Ip: " . $this->helper->getReal_ip() . chr(10) . chr(13);
        $message .= "E-mail: " . $datos['email'] . chr(10) . chr(13);
        $message .= "Asunto: " . $datos['asunto'] . chr(10) . chr(13);
        $message .= "Mensaje:" . $datos['mensaje'] . chr(10) . chr(13);
        $message .= "Enviado el " . date('Y-m-d H:i:s');
        //$this->helper->sendMail($email, $asunto, $message);
        $data = array(
            'type' => 'success',
            'content' => '<div class="contact_box contact_box_modern dark"><div class="contact_box_wrapper">Gracias por ponerte en contacto conmigo. En la brevedad posible me pondré en contacto contigo...</div></div>'
        );
        return $data;
    }

    public function datosMapa() {
        $sql = $this->db->select("SELECT latitud, longitud, zoommap, tipo_mapa FROM `web_datos`;");
        return $sql[0];
    }

}
