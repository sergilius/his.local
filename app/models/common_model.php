<?php  if ( ! defined('READFILE')) exit('No direct script access allowed');

class common_model extends model {

    public static function get_menus($page_name = FALSE) {

        $query_type = 'select_order';
        $arr_table['table'] = 'menu';
        $arr_table['filds'] = 'title_name, aliase, path';
        $arr_table['where'] = FALSE;
        $arr_table['sort'] = 'position';
        $arr_table['dir'] = 'ASC';
        $arr_table['start'] = FALSE;
        $arr_table['limit'] = FALSE;
        $fetch_type = FALSE;

        $arr_result = self::select_order($query_type, $arr_table, $fetch_type);

        $box_top = '';
        $box_bottom = '';
        foreach ($arr_result as $arr_data) {
            if ($page_name != $arr_data['aliase']) {
                $box_top .= '<a class="header-nav-item" href="/page' . $arr_data['path'] . '">' . $arr_data['title_name'] . '</a>' . "\n";
            } else {
                $box_top .= '<a class="header-nav-item active" href="/page' . $arr_data['path'] . '">' . $arr_data['title_name'] . '</a>' . "\n";
            }
            $box_bottom .= '<a href="/page' . $arr_data['path'] . '">' . $arr_data['title_name'] . '</a>' . "\n";
        }

        return array($box_top, $box_bottom);
    }

    public static function select_order($query_type, $arr_table, $fetch_type = FALSE) {

        $data_sql = FALSE;
        $query = "SELECT " . $arr_table['filds'] . " FROM " . $arr_table['table'];

        if ($arr_table['where']) {
            $query .= " WHERE " . $arr_table['where'];
        }
        if ($arr_table['sort']) {
            $query .= " ORDER BY " . $arr_table['sort'] . " " . $arr_table['dir'];
        }
        if ($arr_table['start'] and $arr_table['limit']) {
            $query .= " LIMIT " . $arr_table['start'] . ", " . $arr_table['limit'];
        } elseif (!$arr_table['start'] and $arr_table['limit']) {
            $query .= " LIMIT " . $arr_table['limit'];
        }
//echo $query;

//$arr_result = self::get_result($query, $query_type, $data_sql, $fetch_type);
//print_r($arr_result);
        return self::get_result($query, $query_type, $data_sql, $fetch_type);
    }

    public static function set_insert($table, $fields, $mask, $arr_data) {
        $query_sql = "INSERT INTO " . $table . " " . $fields . " values " . $mask;
        $result = model::set_values($query_sql, $arr_data);
//print_r($result);
    }

    public static function select_one($arr_data, $query_type, $data_sql, $fetch_type) {

        $query = "SELECT " . $arr_data['filds'] . " FROM " . $arr_data['table'] . " WHERE " . $arr_data['where'];
//        $result = self::get_result($query, $query_type, $data_sql, $fetch_type);
        return self::get_result($query, $query_type, $data_sql, $fetch_type);
    }

}

/* End of file  */
