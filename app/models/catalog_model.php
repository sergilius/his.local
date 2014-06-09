<?php  if ( ! defined('READFILE')) exit('No direct script access allowed');

class catalog_model extends model {

    public static function get_title(){

        $arr_data['filds'] = 'title_page';
        $arr_data['table'] = 'catalog';
        $query_type = 'select_one';
        $arr_data['where'] = "aliase='catalog'";
        $data_sql = FALSE;
        $fetch_type = TRUE;

        $result = self::select_one($arr_data, $query_type, $data_sql, $fetch_type);
        return $result[0];
    }

    private static function select_one($arr_data, $query_type, $data_sql, $fetch_type){

        $query = "SELECT " . $arr_data['filds']. " FROM " . $arr_data['table'] . " WHERE " . $arr_data['where'];
//        $result = self::get_result($query, $query_type, $data_sql, $fetch_type);
        return self::get_result($query, $query_type, $data_sql, $fetch_type);

    }

    public static function ajax_region($file_name, $arr_json) {
        $file_path = 'app/data/' . $file_name . '.php';
        include_once $file_path;
        $i = 0;
        $arr_region = array();
        foreach ($select_data[$arr_json['region']] as $key => $value) {
            $arr_region[$i] = $key;
            $i += 1;
        }
        return $arr_region;
    }

    public static function ajax_street($file_name, $term) {
        $file_path = 'app/data/' . $file_name . '.php';
        include_once $file_path;

        $arr_street = array();
        foreach ($select_data as $region) {
            foreach ($region as $hestate) {
                foreach ($hestate as $street) {
                    $str_street = mb_strtolower($street, 'UTF-8');
                    if (substr_count($str_street, $term)) {
                        $arr_street[] = $street;
                    }
                }
            }
        }
        return $arr_street;
    }

    public static function ajax_form($arr_json) {
        foreach ($arr_json as $obj_json) {
            $arr_tmp = (array) $obj_json;
            $arr_form[$arr_tmp['name']] = $arr_tmp['value'];
        }
        return $arr_form;
    }

    public static function select_where_order_limit($query_type, $arr_data, $fetch_type = FALSE) {

        if ($arr_data['filds']) {
            $query = "SELECT " . $arr_data['filds'] . " FROM " . $arr_data['table'];
        } else {
            $query = "SELECT * FROM " . $arr_data['table'];
        }

        if ($arr_data['where']) {
            $query .= " WHERE " . $arr_data['where'];
        }
        if ($arr_data['sort']) {
            $query .= " ORDER BY " . $arr_data['sort'];
        }
        if ($arr_data['dir']) {
            $query .= " " . $arr_data['dir'];
        }

        if ($arr_data['start'] and $arr_data['limit']) {
            $query .= " LIMIT " . $arr_data['start'] . ", " . $arr_data['limit'];
        } elseif (!$arr_data['start'] and $arr_data['limit']) {
            $query .= " LIMIT " . $arr_data['limit'];
        }
        $query .= ";";
//echo $query . ' ';
        $data_sql = FALSE;


      return self::get_result($query, $query_type, $data_sql, $fetch_type);
    }

    public static function update_formwin($query_type, $arr_data, $arr_set) {
        $query = "UPDATE " . $arr_data['table'];
        $query .=" SET ";
        $query .= self::equality_formation($arr_set);
        $query .=" WHERE " . $arr_data['where'] . "; ";   // ------ $arr_data['where'] -- $arr_data['limit'] ----$arr_data[ORDER BY]

        $data_sql = FALSE;
        $fetch_type = FALSE;
//echo $query;
        return self::get_result($query, $query_type, $data_sql, $fetch_type);
    }

    public static function insert_formwin($query_type, $arr_data, $arr_set) {
        $query = "INSERT INTO " . $arr_data['table'];
        $query .=" SET ";
        $query .= self::equality_formation($arr_set);
        if($arr_data['table'] == 'log'){
            $query .= ", edate=NOW() ";
        }
//        $query .= ($arr_data['table'] == 'log') ? ($query .= ", edate=NOW() ") : '';
//        $query .= ($arr_data['table'] == 'log') ? (", edate=NOW() ") : '';
//        $query = "INSERT INTO template SET name='3d3d', descr='d3d3', source='C:/TEMP/1var.jpg', market_id='1', spec_id='1', type_id='1'";
        $data_sql = FALSE;
        $fetch_type = FALSE;
//echo $query;
        return self::get_result($query, $query_type, $data_sql, $fetch_type);
    }

    public static function delete_formwin($query_type, $arr_data) {
        $query = "DELETE FROM " . $arr_data['table'] . " WHERE id='" . $arr_data['delete'] . "'";
        $data_sql = FALSE;
        $fetch_type = FALSE;
        return self::get_result($query, $query_type, $data_sql, $fetch_type);
    }

    protected static function equality_formation($arr_set) {
        $i = 0;
        $query = '';
        foreach ($arr_set as $key => $value) {
            if ($i) {$query .= ", ";}
            $query .= $key . "='" . $value . "'";
            $i++;
        }
        return $query;
    }

}

