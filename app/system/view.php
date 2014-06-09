<?php  if ( ! defined('READFILE')) exit('No direct script access allowed');

class view {

    public static function read_file($file_path) {
        return file_get_contents($file_path);
    }

    public static function includ_file($file_path, $data = '') {
        include_once $file_path;
    }

    public static function ajax_view($data, $id_title) {

        switch ($id_title) {
            case 200:
                $titel_header = 'HTTP/1.1 200 OK';
                break;
            case '400':
                $titel_header = 'HTTP/1.1 400 Bad Request';
                break;
            case '404':
                $titel_header = 'HTTP/1.1 404 Not Found';
                break;
        }
        $result_str = json_encode($data);

//        $titel_header = 'HTTP/1.1 200 OK';
        header($titel_header);
        $json_data = json_encode($data);
        echo $json_data;
//        echo $data;
    }

}

/* End of file  */
