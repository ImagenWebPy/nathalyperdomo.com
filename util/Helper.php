<?php

require 'libs/Database.php';

class Helper {

    private $db = '';

    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    /**
     * Funcion para limpiar un string
     * @param strig $String a quitar caracteres especiales y espacios
     * @return string formateado
     */
    public function cleanUrl($String) {
        $String = str_replace(array('á', 'à', 'â', 'ã', 'ª', 'ä'), "a", $String);
        $String = str_replace(array('Á', 'À', 'Â', 'Ã', 'Ä'), "A", $String);
        $String = str_replace(array('Í', 'Ì', 'Î', 'Ï'), "I", $String);
        $String = str_replace(array('í', 'ì', 'î', 'ï'), "i", $String);
        $String = str_replace(array('é', 'è', 'ê', 'ë'), "e", $String);
        $String = str_replace(array('É', 'È', 'Ê', 'Ë'), "E", $String);
        $String = str_replace(array('ó', 'ò', 'ô', 'õ', 'ö', 'º'), "o", $String);
        $String = str_replace(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö'), "O", $String);
        $String = str_replace(array('ú', 'ù', 'û', 'ü'), "u", $String);
        $String = str_replace(array('Ú', 'Ù', 'Û', 'Ü'), "U", $String);
        $String = str_replace(array('?', '[', '^', '´', '`', '¨', '~', ']', '¿', '!', '¡'), "", $String);
        $String = str_replace("ç", "c", $String);
        $String = str_replace("Ç", "C", $String);
        $String = str_replace("ñ", "n", $String);
        $String = str_replace("Ñ", "N", $String);
        $String = str_replace("Ý", "Y", $String);
        $String = str_replace("ý", "y", $String);

        $String = str_replace("'", "", $String);
        //$String = str_replace(".", "_", $String);
        $String = str_replace("#", "_", $String);
        $String = str_replace(" ", "_", $String);
        $String = str_replace("/", "_", $String);

        $String = str_replace("&aacute;", "a", $String);
        $String = str_replace("&Aacute;", "A", $String);
        $String = str_replace("&eacute;", "e", $String);
        $String = str_replace("&Eacute;", "E", $String);
        $String = str_replace("&iacute;", "i", $String);
        $String = str_replace("&Iacute;", "I", $String);
        $String = str_replace("&oacute;", "o", $String);
        $String = str_replace("&Oacute;", "O", $String);
        $String = str_replace("&uacute;", "u", $String);
        $String = str_replace("&Uacute;", "U", $String);
        return $String;
    }

    /**
     * Funcion para limpiar un input antes de enviarlo por post
     * @param type $data
     * @return type
     */
    public function cleanInput($data) {
        $data = trim($data);
        $data = str_replace("'", "\'", $data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);

        return $data;
    }

    /**
     * Funcion para mostrar mensajes de alerta
     * @param string $type (success - info - warning - error)
     * @param string $message (mensaje a mostrar)
     * @return string
     */
    public function messageAlert($type, $message) {
        $alert = "";
        switch ($type) {
            case 'success':
                $alert .= '<div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            ' . $message . '
                        </div>';
                break;
            case 'info':
                $alert .= '<div class="alert alert-info" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            ' . $message . '
                        </div>';
                break;
            case 'warning':
                $alert .= '<div class="alert alert-warning" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            ' . $message . '
                        </div>';
                break;
            case 'error':
                $alert .= '<div class="alert alert-danger" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            ' . $message . '
                        </div>';
                break;
        }
        return $alert;
    }

    /**
     * 
     * @return string url anterior del sitio
     */
    public function getUrlAnterior() {
        $url = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '';
        return $url;
    }

    /**
     * Funcion que retorna la url actual en forma de array
     * @return array url
     */
    public function getUrl() {
        $url = '';
        if (!empty($_GET['url'])) {
            $url = $_GET['url'];
            $url = explode('/', $url);
        }
        return $url;
    }

    /**
     * Funcion que lista las opciones del campo enum de una tabla
     * @param string $table
     * @param string $field
     * @return array con las opciones del campo enum
     */
    public function getEnumOptions($table, $field) {
        $finalResult = array();
        if (strlen(trim($table)) < 1)
            return false;
        $query = $this->db->select("show columns from $table");
        foreach ($query as $row) {
            if ($field != $row["Field"])
                continue;
//check if enum type 
            if (preg_match('/enum.(.*)./', $row['Type'], $match)) {
                $opts = explode(',', $match[1]);
                foreach ($opts as $item)
                    $finalResult[] = substr($item, 1, strlen($item) - 2);
            } else
                return false;
        }
        return $finalResult;
    }

    /**
     * Funcion para obtener las paginas donde nos encontramos
     * @return array
     */
    public function getPage() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $pagina = (explode('/', $url));
        return $pagina;
    }

    /**
     * Devuelve la ip del visitante
     * @return string IP
     */
    public function getReal_ip() {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    /**
     * 
     * @param int $per_page
     * @param int $page
     * @param string $table (tabla a obtener el maximo de registros)
     * @param string $section (ruta del mvc a paginar)
     * @return string
     */
    public function mostrarPaginador($per_page, $page, $table, $section, $condicion = NULL) {
        if (!empty($condicion)) {
            $query = $this->db->select("SELECT COUNT(*) as totalCount $condicion");
        } else {
            $query = $this->db->select("SELECT COUNT(*) as totalCount FROM $table where estado = 1");
        }
        $total = $query[0]['totalCount'];
        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $setLastpage = ceil($total / $per_page);
        $lpm1 = $setLastpage - 1;

        $paging = "";
        if ($setLastpage > 1) {
            $paging .= "<ul class='pagination'>";
            $paging .= "<li class='active'>Página $page de $setLastpage</li>";
            if ($setLastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $setLastpage; $counter++) {
                    if ($counter == $page)
                        $paging .= "<li class='active'><a href='#'>$counter</a></li>";
                    else
                        $paging .= '<li><a href="' . URL . $section . '/' . $counter . '" data-size="small" data-color="secondary" data-border>' . $counter . '</a></li>';
                }
            }
            elseif ($setLastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $paging .= '<li class="active"><a href="#">' . $counter . '</a></li>';
                        else
                            $paging .= '<li><a  href="' . URL . $section . '/' . $counter . '" data-size="small" data-color="secondary" data-border>' . $counter . '</a></li>';
                    }
                    $paging .= "<li class='dot'>...</li>";
                    $paging .= '<li><a  href="' . URL . $section . '/' . $lpm1 . '" data-size="small" data-color="secondary" data-border>' . $lpm1 . '</a></li>';
                    $paging .= '<li><a  href ="' . URL . $section . '/' . $setLastpage . '" data-size="small" data-color="secondary" data-border>' . $setLastpage . '</a></li>';
                }
                elseif ($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $paging .= '<li><a  href ="' . URL . $section . '/1' . '" data-size="small" data-color="secondary" data-border>1</a></li>';
                    $paging .= '<li><a  href ="' . URL . $section . '/2' . '" data-size="small" data-color="secondary" data-border>2</a></li>';
                    $paging .= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $paging .= "<li class='active'><a href='#'>$counter</a></li>"
                            ;
                        else
                            $paging .= '<li><a  href ="' . URL . $section . '/' . $counter . '" data-size="small" data-color="secondary" data-border>' . $counter . '</a></li>';
                    }
                    $paging .= "<li class='dot'>..</li>";
                    $paging .= '<li><a  href="' . URL . $section . '/' . $lpm1 . '" data-size="small" data-color="secondary" data-border>' . $lpm1 . '</a></li>';
                    $paging .= '<li><a  href="' . URL . $section . '/' . $setLastpage . '" data-size="small" data-color="secondary" data-border>' . $setLastpage . '</a></li>';
                }
                else {
                    $paging .= '<li><a  href ="' . URL . $section . '/1' . '" data-size="small" data-color="secondary" data-border>1</a></li>';
                    $paging .= '<li><a  href ="' . URL . $section . '/2' . '" data-size="small" data-color="secondary" data-border>2</a></li>';
                    $paging .= "<li class = 'dot'>..</li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
                        if ($counter == $page)
                            $paging .= "<li class='active'><a href='#'>$counter</a></li>"
                            ;
                        else
                            $paging .= '<li><a  href="' . URL . $section . '/' . $counter . '" data-size="small" data-color="secondary" data-border>' . $counter . '</a></li>';
                    }
                }
            }

            if ($page < $counter - 1) {
                $paging .= '<li><a href="' . URL . $section . '/' . $next . '" data-size="small" data-color="secondary" data-border >Siguiente</a></li>';
                $paging .= '<li><a href="' . URL . $section . '/' . $setLastpage . '" data-size="small" data-color="secondary" data-border>Ultima</a></li>';
            } else {
                $paging .= "<li class='active'><a href='#'>Siguiente</a></li>";
                $paging .= "<li class='active'><a href='#'>Ultima</a></li>";
            }

            $paging .= "</ul>";
        }

        return $paging;
    }

    function redimensionar($file, $nameFile, $ancho, $alto, $serverdir) {
        # se obtene la dimension y tipo de imagen 
        $datos = getimagesize($file);

        $ancho_orig = $datos[0]; # Anchura de la imagen original 
        $alto_orig = $datos[1];    # Altura de la imagen original 
        $tipo = $datos[2];

        if ($tipo == 1) { # GIF 
            if (function_exists("imagecreatefromgif"))
                $img = imagecreatefromgif($file);
            else
                return false;
        }
        else if ($tipo == 2) { # JPG 
            if (function_exists("imagecreatefromjpeg"))
                $img = imagecreatefromjpeg($file);
            else
                return false;
        }
        else if ($tipo == 3) { # PNG 
            if (function_exists("imagecreatefrompng"))
                $img = imagecreatefrompng($file);
            else
                return false;
        }

        # Se calculan las nuevas dimensiones de la imagen 
        if ($ancho_orig > $alto_orig) {
            $ancho_dest = $ancho;
            $alto_dest = ($ancho_dest / $ancho_orig) * $alto_orig;
        } else {
            $alto_dest = $alto;
            $ancho_dest = ($alto_dest / $alto_orig) * $ancho_orig;
        }

        // imagecreatetruecolor, solo estan en G.D. 2.0.1 con PHP 4.0.6+ 
        $img2 = @imagecreatetruecolor($ancho_dest, $alto_dest) or $img2 = imagecreate($ancho_dest, $alto_dest);

        // Redimensionar 
        // imagecopyresampled, solo estan en G.D. 2.0.1 con PHP 4.0.6+ 
        @imagecopyresampled($img2, $img, 0, 0, 0, 0, $ancho_dest, $alto_dest, $ancho_orig, $alto_orig) or imagecopyresized($img2, $img, 0, 0, 0, 0, $ancho_dest, $alto_dest, $ancho_orig, $alto_orig);

        // Crear fichero nuevo, según extensión. 
        if ($tipo == 1) // GIF 
            if (function_exists("imagegif"))
                imagegif($img2, $serverdir . $nameFile, 60);
            else
                return false;

        if ($tipo == 2) // JPG 
            if (function_exists("imagejpeg"))
                imagejpeg($img2, $serverdir . $nameFile, 60);
            else
                return false;

        if ($tipo == 3)  // PNG 
            if (function_exists("imagepng"))
                imagepng($img2, $serverdir . $nameFile, 6);
            else
                return false;

        return true;
    }

    /**
     * Funcion que envia un correo a travez de la funcion mail de PHP.
     * @param string $para
     * @param string $asunto
     * @param string $mensaje
     * @param string $cc
     */
    public function sendMail($para, $asunto, $mensaje, $cc = NULL) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: CADIEM Fondos <atc@cadiemfondos.com.py>' . "\r\n";
        if (!empty($cc))
            $headers .= 'Bcc:' . $emailAsesor . "\r\n";
        $headers .= 'Reply-To: atc@cadiemfondos.com.py' . "\r\n";
        mail($para, $asunto, $mensaje, $headers);
    }

    /**
     * Ver http://php.net/manual/es/function.date.php para mas información sobre los formatos de fecha.
     * @param string $format
     * @param type $month (Nombre abreviado o completo del mes en ingles de acuerdo al formato elegido)
     * @return string
     */
    public function TranslateDate($format, $month, $language = 'es') {
        $mes = '';
        switch ($format) {
            case 'F':
                switch ($month) {
                    case 'January':
                        $mes = 'Enero';
                        break;
                    case 'February':
                        $mes = 'Febrero';
                        break;
                    case 'March':
                        $mes = 'Marzo';
                        break;
                    case 'April':
                        $mes = 'Abril';
                        break;
                    case 'May':
                        $mes = 'Mayo';
                        break;
                    case 'June':
                        $mes = 'Junio';
                        break;
                    case 'July':
                        $mes = 'Julio';
                        break;
                    case 'August':
                        $mes = 'Agosto';
                        break;
                    case 'September':
                        $mes = 'Septiembre';
                        break;
                    case 'October':
                        $mes = 'Octubre';
                        break;
                    case 'November':
                        $mes = 'Noviembre';
                        break;
                    case 'December':
                        $mes = 'Diciembre';
                        break;
                }
                break;
            case 'M':
                switch ($language) {
                    case 'es':
                        switch ($month) {
                            case 'Jan':
                                $mes = 'Ene';
                                break;
                            case 'Feb':
                                $mes = 'Feb';
                                break;
                            case 'Mar':
                                $mes = 'Mar';
                                break;
                            case 'Apr':
                                $mes = 'Abr';
                                break;
                            case 'May':
                                $mes = 'May';
                                break;
                            case 'Jun':
                                $mes = 'Jun';
                                break;
                            case 'Jul':
                                $mes = 'Jul';
                                break;
                            case 'Aug':
                                $mes = 'Ago';
                                break;
                            case 'Sept':
                                $mes = 'Set';
                                break;
                            case 'Sep':
                                $mes = 'Set';
                                break;
                            case 'Oct':
                                $mes = 'Oct';
                                break;
                            case 'Nov':
                                $mes = 'Nov';
                                break;
                            case 'Dec':
                                $mes = 'Dic';
                                break;
                        }
                        break;
                    case 'en':
                        switch ($month) {
                            case 'Ene':
                                $mes = 'Jan';
                                break;
                            case 'Feb':
                                $mes = 'Feb';
                                break;
                            case 'Mar':
                                $mes = 'Mar';
                                break;
                            case 'Abr':
                                $mes = 'Apr';
                                break;
                            case 'May':
                                $mes = 'May';
                                break;
                            case 'Jun':
                                $mes = 'Jun';
                                break;
                            case 'Jul':
                                $mes = 'Jul';
                                break;
                            case 'Ago':
                                $mes = 'Aug';
                                break;
                            case 'Set':
                                $mes = 'Sept';
                                break;
                            case 'Set':
                                $mes = 'Sep';
                                break;
                            case 'Oct':
                                $mes = 'Oct';
                                break;
                            case 'Nov':
                                $mes = 'Nov';
                                break;
                            case 'Dic':
                                $mes = 'Dec';
                                break;
                        }
                        break;
                }
                break;
        }
        return $mes;
    }

    /**
     * Funcion que retorna un string aleatorio
     * @param string $type ('numerico','alfanumerico','especial')
     * @param int $length
     * @return string
     */
    public function generateRandomString($type, $length = 10) {
        switch ($type) {
            case 'numerico':
                $characters = '0123456789';
                break;
            case 'alfanumerico':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'especial':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-{}[],.;¿?!¡';
                break;
        }

        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Encrypt and decrypt
     * 
     * @author Nazmul Ahsan <n.mukto@gmail.com>
     * @link http://nazmulahsan.me/simple-two-way-function-encrypt-decrypt-string/
     *
     * @param string $string string to be encrypted/decrypted
     * @param string $action what to do with this? e for encrypt, d for decrypt
     * @return string
     */
    function encrypt($string, $action = 'e') {
        $secret_key = '!@123456789ABCDEFGHIJKLMNOPRSTWYZ[¿]{?}<->';
        $secret_iv = '12345678910AABBCCDDEEFFGG';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if (!empty($string)) {
            if ($action == 'e') {
                $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
            } else if ($action == 'd') {
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            }
        } else {
            $output = '';
        }
        return $output;
    }

    /*     * ***************************
     * FUNCIONES DEL INHERENTES AL SISTEMA
     * ****************************** */

    public function loadPageHeaderData($page) {
        $data = array();
        switch ($page) {
            case 'nosotros':
                $body = 'page page-id-3716 page-child parent-pageid-131 page-template-default color-custom layout-full-width header-bg sticky-header';
                $header = '<div id="Subheader" class="aboutbreadcrumb">
                            <div class="container">
                                <div class="column one">
                                    <h1 class="title">Sobre Nathaly</h1>
                                    <ul class="breadcrumbs">
                                        <li class="home"><a href="' . URL . '">Inicio</a><span><i class="icon-right-open"></i></span></li>
                                        <li><a href="#">Sobre Nathaly</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>';
                break;
            case 'blog':
                $body = 'page page-child page-template-default color-custom layout-full-width header-white header-bg sticky-header';
                $header = ' <div id="Subheader" class="blogbreadcrumb">
                                <div class="container">
                                    <div class="column one">
                                        <h1 class="title">Blog</h1>
                                        <ul class="breadcrumbs">
                                            <li class="home"><a href="' . URL . '">Inicio</a><span><i class="icon-right-open"></i></span></li>
                                            <li><a href="#">Blog</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>';
                break;
            case 'consultorio':
                $body = 'page page-child page-template-default color-custom layout-full-width header-white header-bg sticky-header';
                $header = ' <div id="Subheader" class="consultotiobreadcrumb">
                                <div class="container">
                                    <div class="column one">
                                        <h1 class="title">Consultorio</h1>
                                        <ul class="breadcrumbs">
                                            <li class="home"><a href="' . URL . '">Inicio</a><span><i class="icon-right-open"></i></span></li>
                                            <li><a href="#">Consultorio</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>';
                break;
            case 'contacto':
                $body = 'page page-child page-template-default color-custom layout-full-width header-white header-bg sticky-header';
                $header = ' <div id="Subheader" class="contactobreadcrumb">
                                <div class="container">
                                    <div class="column one">
                                        <h1 class="title">Contacto</h1>
                                        <ul class="breadcrumbs">
                                            <li class="home"><a href="' . URL . '">Inicio</a><span><i class="icon-right-open"></i></span></li>
                                            <li><a href="#">Consultorio</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>';
                break;
            default :
                $body = 'home page page-id-4311 page-parent page-template-default template-slider color-custom layout-full-width header-dark header-alpha sticky-header';
                $header = '<div id="mfn-rev-slider">
                    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
                        <!-- START REVOLUTION SLIDER 4.6.9 fullwidth mode -->
                        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner">
                            <ul>
                                <!-- SLIDE  -->
                                <li data-transition="notransition" data-slotamount="7" data-masterspeed="100" data-delay="7000" data-saveperformance="off">
                                    <!-- MAIN IMAGE -->
                                    <img src="' . URL . 'public/images/transparent.png" alt="home_slide_1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                    <!-- LAYERS -->
                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption tp-fade fadeout" data-x="center" data-hoffset="0" data-y="bottom" data-voffset="800" data-speed="1500" data-start="1100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" data-endeasing="Power3.easeInOut">
                                        <img src="' . URL . 'public/upload/revslider/slider1/light_glow.png" alt="">
                                    </div>
                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption large_light sft tp-resizeme gilroy-bold" data-x="center" data-hoffset="0" data-y="120" data-speed="900" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="900" >
                                        Comé lo que te gusta
                                    </div>
                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption medium_light tp-fade tp-resizeme priscilla sliderSecondaryTextSize" data-x="center" data-hoffset="0" data-y="210" data-speed="800" data-start="800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="800">
                                        en la medida justa
                                    </div>
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption customin stb" data-x="center" data-hoffset="0" data-y="320" data-customin="x:0;y:100;z:0;rotationX:-50;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:-500;transformOrigin:50% 50%;" data-speed="1500" data-start="0" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1000" data-endeasing="Power3.easeInOut">
                                        <img src="' . URL . 'public/images/310x649_inicio_1.png" alt="">
                                    </div>
                                </li>
                                <!-- SLIDE  -->
                                <li data-transition="notransition" data-slotamount="7" data-masterspeed="100" data-delay="7000" data-saveperformance="off">
                                    <!-- MAIN IMAGE -->
                                    <img src="' . URL . 'public/images/slider/img1.jpg" alt="unlimited-possibilities_bgd" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                                    <!-- LAYERS -->
                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption large_light lft tp-resizeme gilroy-bold" data-x="left" data-hoffset="0" data-y="200" data-speed="1000" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-end="4700" data-endspeed="300" >
                                        La salud es una relación<br> <span class="priscilla">entre tú y tu cuerpo</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="tp-bannertimer tp-bottom">
                            </div>
                        </div>
                    </div>
                    <!-- END REVOLUTION SLIDER -->
                </div>';
                break;
        }
        $data = array(
            'body' => $body,
            'header' => $header
        );
        return $data;
    }

    /**
     * Funcion que retorna un rango de horas con un intervalo definido
     * @param string $inicio
     * @param sring $fin
     * @param int $rango
     * @return array
     */
    public function getRangoHoras($inicio = '08:00', $fin = '20:30', $intervalo = 30) {
        $horas = array();
        $begin = new DateTime($inicio);
        $end = new DateTime($fin);

        $interval = new DateInterval('PT' . $intervalo . 'M');
        $period = new DatePeriod($begin, $interval, $end);

        foreach ($period as $dt) {
            array_push($horas, $dt->format("H:i"));
        }
        return $horas;
    }
    
    public function getPacientes(){
        $sql = $this->db->select("select * from paciente where estado = 1 order by apellido, nombre asc");
        return $sql;
    }
}
