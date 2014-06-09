<?php if (!defined('READFILE')) exit('No direct script access allowed');

class catalog_controller extends controller {

//    public static function index($target) {
    public static function index() {

//echo 'index'."\n";
        $content = '';
        $data['title_page'] = catalog_model::get_title();
        
        list($data['menu_header'], $data['menu_footer']) = common_model::get_menus(FALSE);

//$content = self::view('controller_view', TRUE);
////        $arr_url = explode("/", $_SERVER['REQUEST_URI']);
//
////        if (!strlen($arr_match[1]) or $arr_match[1] == 'index.php') {
//
//        if (count($arr_url) == 4 and $target == 'page') {
//            $content = self::view('first_page', TRUE);
//echo 'count' . "\n";
//        } else {
//            $content = self::view('error404', TRUE);
//        }
        self::render($data);
    }

    protected static function render($data) {
//        $file_path = 'app/views/catalog_view.php';
//        include_once $file_path;
        self::view('catalog_view', FALSE, $data);
    }

    public static function ajax_data() {

        if (strtolower($_SERVER['REQUEST_METHOD']) == 'get') {

            foreach ($_GET as $key => $value) {                                //  combobox
                $keyN = strip_tags($key);
                $valueN = strip_tags($value);
                $arr_data[$keyN] = $valueN;
            }
            switch ($arr_data['combo']) {
                case 'market_code':
                    $query_type = 'select_order';
                    $arr_data['table'] = 'market';
                    $arr_data['filds'] = 'id, code';
                    $arr_data['where'] = FALSE;
                    $arr_data['sort'] = 'code';
                    $arr_data['start'] = FALSE;
                    $arr_data['limit'] = FALSE;
                    $arr_data['dir'] = 'ASC';

                    $data = page_model::select_where_order_limit($query_type, $arr_data);
                    list($id_title, $data) = self::after_data_combo($data);

                    break;
            }
        } else {

            $arr_url = explode("/", $_SERVER['REQUEST_URI']);

            if (!self::data_filter($arr_url[4])) {                           //проверка - 5-й сегмент URL - только англ. буквы
                $id_title = 400;
                $data = array(
                    "success" => "false",
                    "message" => "неверный адрес"
                );
            } else {

                if (count($arr_url) == 6) {
                    $arr_json = self::ajax_get_decod();
                    switch ($arr_url[4]) {                                           //заполняем grid
                        case 'log':
//echo ' *log* ';
//                        if (isset($_REQUEST['filter'])){
//                              $sourse_filter_where = self::filter_to_sql();
//                              $arr_filter = $_REQUEST['filter'];
//                              $arr_json['where'] = substr($sourse_filter_where, 5);
//                              }else{
//                              $arr_json['after_time'] = FALSE;
//                              }

                            $arr_json['table'] = $arr_url[4];
                            $query_type = 'select_order';

                            $id_small = 0;
                            $id_big = 0;

                            if (isset($arr_json['small_time'])) {
//echo 'aaa';
                                $arr_time = explode('.', $arr_json['small_time']);
//$small_unix =
//mktime(0, 0, 0, 7, 1, 2000));
//                                $year = '20' . $arr_time[2];
////echo $year;
//                                $unix_time = mktime(0, 0, 0, $arr_time[0], $arr_time[1], $arr_time[2]);
//
//                                $small_where = "edate>'" . $unix_time . "'";
//                                $small_where = "edate>'" . 20 . $unix_time . "'";
                                $small_where = "edate>'" . 20 .  $arr_time[2] . '-' . $arr_time[1] . '-' . $arr_time[0] . "'";
                                $id_small = 1;

                                if (isset($arr_json['big_time'])) {
                                    $arr_time = explode('.', $arr_json['big_time']);
//                                    $year = '20' . $arr_time[2];
//                                    $unix_time = mktime(0, 0, 0, $arr_time[0], $arr_time[1], $arr_time[2]);
//
//                                    $big_where = "edate<'" . 20 . $unix_time . "'";
$big_where = "edate<'" . 20 .  $arr_time[2] . '-' . $arr_time[1] . '-' . $arr_time[0] . "'";
                                    $id_big = 1;

                                    if ($small_where and $big_where) {
                                        $arr_json['where'] = $small_where . " AND " . $big_where;
                                    } elseif (($small_where and !$big_where)) {
                                        $arr_json['where'] = $small_where;
                                    } elseif ((!$small_where and $big_where)) {
                                        $arr_json['where'] = $big_where;
                                    }
                                }
                            } else {
                                $arr_json['where'] = FALSE;
                            }

                            $arr_json['filds'] = ' * ';
//                            $arr_json['where'] = FALSE;
//$arr_json['start'] = (empty($_POST['action'])) ? 'default' : $_POST['action'];
                            $arr_json['start'] = (isset($arr_json['start'])) ? $arr_json['start'] : FALSE;
                            $arr_json['limit'] = (isset($arr_json['limit'])) ? $arr_json['limit'] : FALSE;
                            $arr_json['sort'] = (isset($arr_json['sort'])) ? $arr_json['sort'] : FALSE;
                            $arr_json['dir'] = (isset($arr_json['dir'])) ? $arr_json['dir'] : FALSE;

//                            $arr_json['start'] = (isset($arr_json['start'])) ? : FALSE;
//                            $arr_json['limit'] = (isset($arr_json['limit'])) ? : FALSE;
//                            $arr_json['sort'] = (isset($arr_json['sort'])) ? : FALSE;
//                            $arr_json['dir'] = (isset($arr_json['dir'])) ? : FALSE;
//
//                            if ($arr_json['start']) {
//                                $arr_json['start'] = 0;
//                            }
//                            if ($arr_json['limit']) {
//                                $arr_json['limit'] = 50;
//                            }


                            if (isset($small_where) or isset($big_where)) {
                                $data_tmp = page_model::select_where_order_limit($query_type, $arr_json);
                                $data_succ = array("success" => "true", "message" => " ");

//                                $data[] = array("success" => "true", "message" => " ");
//                                $data[] = $data_tmp;
//print_r($data_tmp);
                                list($total, $data_tmp) = self::after_data($data_tmp);
                                $data = array_merge($data_succ, $data_tmp);
                                $id_title = self::id_title_count($total);
//echo $id_title;
                            } else {
                                $data = page_model::select_where_order_limit($query_type, $arr_json);
                                list($total, $data) = self::after_data($data);
                                $id_title = self::id_title_count($total);
                            }
                            break;

                        case 'params':
                            $query_type = 'select_order';

                            $arr_json['table'] = $arr_url[4];
                            $arr_json['filds'] = ' * ';

                            $arr_json['where'] = FALSE;
                            if (!isset($arr_json['start'])) {
                                $arr_json['start'] = 0;
                            }
                            if (!isset($arr_json['limit'])) {
                                $arr_json['limit'] = 50;
                            }
                            $data = page_model::select_where_order_limit($query_type, $arr_json);
                            list($total, $data) = self::after_data($data);
                            $id_title = self::id_title_count($total);
                            break;
                        case 'template':
                            $query_type = 'select_order';

                            $arr_json['table'] = 'template, market, specialization, templatetype';
                            $arr_json['filds'] = 'template.id, template.name AS template_name, market.code AS market_code, specialization.value AS specialization_value, template.descr AS template_descr, template.source AS template_source, templatetype.value AS templatetype_value';
                            $arr_json['where'] = 'template.market_id=market.id AND template.spec_id=specialization.id AND template.type_id=templatetype.id';
                            $arr_json['sort'] = 'template.' . $arr_json['sort'];
                            $arr_json['dir'] = 'ASC';
                            $arr_json['start'] ? : 0;
                            $arr_json['limit'] ? : 0;

                            $data = page_model::select_where_order_limit($query_type, $arr_json);
                            list($total, $data) = self::after_data($data);
                            $id_title = self::id_title_count($total);
                            break;
                        /*
                          case 'form':
                          sleep(10);
                          $arr_json = self::ajax_input();
                          $data = page_model::ajax_form($arr_json);
                          break;
                         */
                    }
                } elseif (count($arr_url) == 5) {
                    if ($arr_url[4] == 'edit') {                          //исполняем запрос на заполнение формы - edit(add)
                        $arr_json = self::ajax_get_decod();
                        switch ($arr_json['table']) {
                            case 'log':
                                $fetch_type = 'num';
                                $query_type = 'select_one';
//                            $arr_json['table'] = 'log';
                                $arr_json['filds'] = FALSE;
                                $arr_json['where'] = "id = " . $arr_json[$arr_url[4]];
                                $arr_json['sort'] = FALSE;
                                $arr_json['dir'] = FALSE;
                                $arr_json['start'] = FALSE;
                                $arr_json['limit'] = FALSE;
                                $data = page_model::select_where_order_limit($query_type, $arr_json, $fetch_type);
                                $id_title = count($data) ? 200 : 400;

                                break;
                            case 'params':
                                $fetch_type = 'num';
                                $query_type = 'select_one';

                                $arr_json['filds'] = FALSE;
                                $arr_json['where'] = "id = " . $arr_json[$arr_url[4]];
                                $arr_json['sort'] = FALSE;
                                $arr_json['dir'] = FALSE;
                                $arr_json['start'] = FALSE;
                                $arr_json['limit'] = FALSE;
                                $data = page_model::select_where_order_limit($query_type, $arr_json, $fetch_type);
                                $id_title = count($data) ? 200 : 400;
                                break;
                            case 'template':
                                $fetch_type = 'num';
                                $query_type = 'select_one';

                                $arr_json['table'] = 'template, market, specialization, templatetype';
                                $arr_json['filds'] = 'template.id, template.name AS template_name, market.code AS market_code, specialization.value AS specialization_value, template.descr AS template_descr, template.source AS template_source, templatetype.value AS templatetype_value';
//                            $arr_json['where'] = "template.market_id=market.id AND template.spec_id=specialization.id AND template.type_id=templatetype.id AND template.market_id='".$arr_json['edit']."'";
                                $arr_json['where'] = "template.market_id=market.id AND template.spec_id=specialization.id AND template.type_id=templatetype.id AND template.id='" . $arr_json['edit'] . "'";
                                $arr_json['sort'] = FALSE;
                                $arr_json['dir'] = FALSE;
                                $arr_json['start'] = FALSE;
                                $arr_json['limit'] = FALSE;
                                $data = page_model::select_where_order_limit($query_type, $arr_json, $fetch_type);
                                $data[] = $data[5];
//print_r($data);
                                $id_title = count($data) ? 200 : 400;
                                break;
                        }
                    } elseif ($arr_url[4] == 'formwin') {                      //ВЫПОЛНЯЕМ запрос на редактирование строки таблицы - edit + add
                        $arr_json = self::ajax_urldecode();
                        if (isset($arr_json['func'])) {

                            switch ($arr_json['table']) {
                                case 'log':
                                    if ($arr_json['func'] == 'edit') {                                    //    edit
                                        $query_type = 'update';
//*******                                $arr_set['edate'] = $arr_json['edate'];
                                        $arr_set['ip'] = $arr_json['ip'];
                                        $arr_set['logdata'] = $arr_json['logdata'];
                                        $arr_json['where'] = "id='" . $arr_json['idrow'] . "'";
                                        $arr_json['limit'] = FALSE;

                                        $data = page_model::update_formwin($query_type, $arr_json, $arr_set);
                                        list($id_title, $data) = self::data_larger($data);
                                    } elseif ($arr_json['func'] == 'add') {                 //    $arr_json['func'] == 'add'
                                        $query_type = 'insert';
                                        $arr_set['ip'] = $arr_json['ip'];
                                        $arr_set['logdata'] = $arr_json['logdata'];

                                        $data = page_model::insert_formwin($query_type, $arr_json, $arr_set);
                                        list($id_title, $data) = self::data_larger($data);
                                    }
                                    break;
                                case 'params':
                                    if ($arr_json['func'] == 'edit') {               //    edit
                                        $query_type = 'update';
                                        $arr_set['value'] = $arr_json['value'];
                                        $arr_set['descr'] = $arr_json['descr'];
                                        $arr_set['name'] = $arr_json['name'];
                                        $arr_set['code'] = $arr_json['code'];
                                        $arr_json['where'] = "id='" . $arr_json['idrow'] . "'";
                                        $arr_json['limit'] = FALSE;

                                        $data = page_model::update_formwin($query_type, $arr_json, $arr_set);
                                        list($id_title, $data) = self::data_larger($data);
                                    } elseif ($arr_json['func'] == 'add') {               //    add -----------
                                        $query_type = 'insert';
                                        $arr_set['value'] = $arr_json['value'];
                                        $arr_set['descr'] = $arr_json['descr'];
                                        $arr_set['name'] = $arr_json['name'];
                                        $arr_set['code'] = $arr_json['code'];

                                        $data = page_model::insert_formwin($query_type, $arr_json, $arr_set);
                                        list($id_title, $data) = self::data_larger($data);
                                    }
                                    break;
                            }
                        } elseif (isset($arr_json['delete'])) {
                            $query_type = 'delete';
                            $data = page_model::delete_formwin($query_type, $arr_json);
                            list($id_title, $data) = self::data_larger($data);
                        }
                    }
                }
            }
        }
        view::ajax_view($data, $id_title);
    }

    protected static function id_title_count($total) {
        if ($total) {
            $id_title = 200;
        } else {
            $id_title = 400;
        }
        return $id_title;
    }

    public static function data_larger($data) {
        if ($data > 0) {
            $id_title = 200;
            $data = array("success" => true, "message" => "");
        } else {
            $id_title = 400;
            $data = array("success" => false, "message" => "eroor");
        }
        return array($id_title, $data);
    }

    protected static function data_filter($data) {
        if (preg_match('/^[a-z]+$/', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    protected static function after_data($data) {
        $total = count($data);
        $data = array(
            'total' => $total,
            'rows' => $data
        );
        return array($total, $data);
    }

    protected static function after_data_combo($data) {
        $id_title = count($data) ? 200 : 400;
        $data = array('rows' => $data);
        return array($id_title, $data);
    }

    protected static function ajax_get_decod() {
        $arr_input = preg_split("/&/", strip_tags(file_get_contents('php://input'), true));

        foreach ($arr_input as $value) {
            $arr_tmp = preg_split("/=/", $value);
            $arr_result[$arr_tmp[0]] = $arr_tmp[1];
        }
        return $arr_result;
    }

    protected static function ajax_input() {
        $obj_json = (json_decode(strip_tags(file_get_contents('php://input'), true)));
        $arr_json = (array) $obj_json;
        return $arr_json;
    }

    protected static function ajax_urldecode() {
        $arr_input = preg_split("/&/", strip_tags(urldecode(file_get_contents('php://input')), true));
        foreach ($arr_input as $value) {
            $arr_tmp = preg_split("/=/", $value);
            $arr_result[$arr_tmp[0]] = $arr_tmp[1];
        }
        return $arr_result;
    }

    protected static function filter_to_sql() {
        $filters = isset($_REQUEST['filter']) ? $_REQUEST['filter'] : null;
//echo 'filters '.$filters; //*********************************
        if (is_array($filters)) {
            $encoded = false;
        } else {
            $encoded = true;
            $filters = json_decode($filters);
        }
//echo 'filters '.$filters; //*********************************
        /*
          //$where = ' 0 = 0 ';
          switch ($table) {
          case '_transporter':
          $field = 'id';
          break;
          default:
          $field = 'idt';
          }

          $where = $field . '=' . $id_user;
         */
        $qs = '';

        // loop through filters sent by client
        if (is_array($filters)) {
            for ($i = 0; $i < count($filters); $i++) {
                $filter = $filters[$i];

                // assign filter data (location depends if encoded or not)
                if ($encoded) {
                    $field = $filter->field;
                    $value = $filter->value;
                    $compare = isset($filter->comparison) ? $filter->comparison : null;
                    $filterType = $filter->type;
                } else {
                    $field = $filter['field'];
                    $value = $filter['data']['value'];
                    $compare = isset($filter['data']['comparison']) ? $filter['data']['comparison'] : null;
                    $filterType = $filter['data']['type'];
                }

                switch ($filterType) {
                    case 'string' : $qs .= " AND " . $field . " LIKE '%" . $value . "%'";
                        Break;
                    case 'list' :
                        if (strstr($value, ',')) {
                            $fi = explode(',', $value);
                            for ($q = 0; $q < count($fi); $q++) {
                                $fi[$q] = "'" . $fi[$q] . "'";
                            }
                            $value = implode(',', $fi);
                            $qs .= " AND " . $field . " IN (" . $value . ")";
                        } else {
                            $qs .= " AND " . $field . " = '" . $value . "'";
                        }
                        Break;
                    case 'boolean' : $qs .= " AND " . $field . " = " . ($value);
                        Break;
                    case 'numeric' :
                        switch ($compare) {
                            case 'eq' : $qs .= " AND " . $field . " = " . $value;
                                Break;
                            case 'lt' : $qs .= " AND " . $field . " < " . $value;
                                Break;
                            case 'gt' : $qs .= " AND " . $field . " > " . $value;
                                Break;
                        }
                        Break;
                    case 'date' :
                        switch ($compare) {
                            case 'eq' : $qs .= " AND " . $field . " = '" . date('Y-m-d', strtotime($value)) . "'";
                                Break;
                            case 'lt' : $qs .= " AND " . $field . " < '" . date('Y-m-d', strtotime($value)) . "'";
                                Break;
                            case 'gt' : $qs .= " AND " . $field . " > '" . date('Y-m-d', strtotime($value)) . "'";
                                Break;
                        }
                        Break;
                }
            }
            if ($qs) {
                $where = $where . ',';
            }
            $where .= $qs;
        } return $where;
    }

}
/* End of file  */

