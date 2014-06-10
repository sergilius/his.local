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

    public static function get_list_phones() {
        $query_type = 'select_order';
        $arr_data['filds'] = FALSE;
        $arr_data['table'] = 'phones_preview';
        $arr_data['where'] = FALSE;
        $arr_data['sort'] = 'name';
        $arr_data['dir'] = 'ASC';
        $arr_data['start'] = FALSE;
        $arr_data['limit'] = FALSE;
        $arr_phones = self::select_where_order_limit($query_type, $arr_data, $fetch_type = FALSE);
        return self::forming_list_phones($arr_phones);
    }

    public static function forming_list_phones($arr_phones) {
        $box_phones = '<ul class="phones">' . "\n";
        foreach ($arr_phones as $value) {
            $phohe_card_path = 'catalog/card/' . $value['id'];
            $box_phones .= '    <li class="thumbnail phone-listing" >
        <a class="thumb" href="' . $phohe_card_path . '"> <!-- id + path -->
            <img src="' . $value['imageUrl'] . '"> <!-- img -->
        </a>
        <a href="' . $phohe_card_path . '">' . $value['name'] . '</a> <!--  -->
        <p>' . $value['snippet'] . '</p>
    </li>' . "\n";
        }
        $box_phones .= "</ul>\n";
        return $box_phones;
    }

    private static function select_one($arr_data, $query_type, $data_sql, $fetch_type) {

        $query = "SELECT " . $arr_data['filds'] . " FROM " . $arr_data['table'] . " WHERE " . $arr_data['where'];
//        $result = self::get_result($query, $query_type, $data_sql, $fetch_type);
        return self::get_result($query, $query_type, $data_sql, $fetch_type);

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


}

