<?php  if ( ! defined('READFILE')) exit('No direct script access allowed');

class converjson_controller {

    public static function phones_preview() {
        $file_path = 'phones/phones.json';
        $obj_json = json_decode(file_get_contents($file_path));
        $result = converjson_model::insert_preview((array) $obj_json);

//        echo"phones_preview";
//        $arr_json = (array) $obj_json;
    }

}

/* End of file  */