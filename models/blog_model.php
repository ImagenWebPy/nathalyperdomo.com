<?php

class Blog_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function listado($pagina) {
        if (!empty($pagina)) {
            $page = $pagina;
        } else {
            $page = 1;
        }
        $setLimit = CANT_REG;
        $pageLimit = ($setLimit * $page) - $setLimit;
        $sql = $this->db->select("select *
                                 from web_blog b 
                                 ORDER BY b.id desc
                                 LIMIT $pageLimit, $setLimit");
        $data = array(
            'listado' => $sql,
            'paginador' => $this->helper->mostrarPaginador($setLimit, $page, 'web_blog', 'blog/listado')
        );
        return $data;
    }

    public function post($id) {
        $sql = $this->db->select("select * from web_blog where id = $id");
        return $sql[0];
    }

    public function resultadosBusquedas($datos) {
        if (!empty($pagina)) {
            $page = $pagina;
        } else {
            $page = 1;
        }
        $setLimit = CANT_REG;
        $pageLimit = ($setLimit * $page) - $setLimit;
        $busqueda = $datos['busqueda'];
        $sql = $this->db->select("select *
                                 from web_blog b 
                                 where 1 = 1
                                 AND (titulo like '%$busqueda%'
                                     OR contenido like '%$busqueda%')
                                 ORDER BY b.id desc 
                                 LIMIT $pageLimit, $setLimit");
        $condicion = "from web_blog b 
                      where 1 = 1
                      AND (titulo like '%$busqueda%'
                                     OR contenido like '%$busqueda%')
                                 ORDER BY b.id desc";
        #guardamos el dato buscado
        $ip = $this->helper->getReal_ip();
        $cantResultado = count($sql);
        $this->db->insert('web_blog_busquedas', array(
            'busqueda' => utf8_decode($busqueda),
            'ip' => $ip,
            'fecha' => date('Y-m-d H:i:s'),
            'cantidad' => $cantResultado
        ));
        $data = array(
            'listado' => $sql,
            'paginador' => $this->helper->mostrarPaginador($setLimit, $page, 'web_blog', 'blog/busqueda', $condicion)
        );
        return $data;
    }

}
