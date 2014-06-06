<?php  if ( ! defined('READFILE')) exit('No direct script access allowed');

class controller extends view {

    public static function view($file_name, $options = FALSE, $data = '') {     //options - TRUE/FALSE - read/include file

        $file_path = 'app/views/' . $file_name . '.php';
        if (file_exists(realpath($file_path))) {
            if ($options) {
                return self::read_file($file_path);
            } else {
                self::includ_file($file_path, $data);
            }
        } else {
            return self::read_file($file_path);
        }
    }

}

/* End of file  */
