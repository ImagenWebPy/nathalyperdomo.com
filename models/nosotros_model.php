<?php

class Nosotros_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function datos_nosotros() {
        $sql = $this->db->select("SELECT * FROM `web_page_nosotros` where id = 1;");
        return $sql[0];
    }

}
