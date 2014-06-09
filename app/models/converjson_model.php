<?php  if ( ! defined('READFILE')) exit('No direct script access allowed');

class converjson_model {
    
    public static function insert_preview($obj_json){
        $arr_data =array();
        $arr_json =array();
        foreach ($obj_json as $key => $value) {
            $fields = '(id,name,snippet,imageUrl)';
            $mask = '(?,?,?,?)';
            $table = 'phones_preview';
            
            $arr_json[$key] = (array)$obj_json[$key];
            $arr_data[$key] = array($arr_json[$key]['id'],$arr_json[$key]['name'],$arr_json[$key]['snippet'],$arr_json[$key]['imageUrl']);
        }
        
        $result = common_model::set_insert($table, $fields, $mask, $arr_data);
//echo '<pre>';
//print_r($arr_data);
//echo '</pre>';
    }

}
/* End of file  */