<?php if (!defined('READFILE')) exit('No direct script access allowed');

class file_controler extends controller {

    public static function index() {

        $arr_url = explode("/", $_SERVER['REQUEST_URI']);                                  //        'delete';
        if (isset($_REQUEST['table']) and $_REQUEST['table'] == 'template' and isset($_REQUEST['delete']) and $arr_url[4] == 'formwin') {
            $fetch_type = 'num';
            $query_type = 'select_one';

            $arr_upl['table'] = 'template';
            $arr_upl['filds'] = 'source';
            $arr_upl['where'] = "id='" . strip_tags($_REQUEST['delete']) . "'";
            $arr_upl['sort'] = FALSE;
            $arr_upl['dir'] = FALSE;
            $arr_upl['start'] = FALSE;
            $arr_upl['limit'] = FALSE;

            $arr_file_path = page_model::select_where_order_limit($query_type, $arr_upl, $fetch_type);

            if (file_exists($arr_file_path[0])) {
                $result_del = unlink($arr_file_path[0]);
                if (!$result_del) {
                    return '{"success": false, "message": " error deleting"}';
                }
            }
            $arr_upl['delete'] = strip_tags($_REQUEST['delete']);
            $query_type = 'delete';
            $data = page_model::delete_formwin($query_type, $arr_upl);
            list($id_title, $data) = page_controller::data_larger($data);
        } elseif ($arr_url[4] == 'formwin' and isset($_REQUEST['func']) and $_REQUEST['func'] == 'edit' and isset($_REQUEST['table']) and $_REQUEST['table'] == 'template') {
            $fetch_type = 'num';
            $query_type = 'select_one';                                                           //    ['func'] == 'edit'

            $arr_upl['table'] = 'params';
            $arr_upl['filds'] = 'value';
            $arr_upl['where'] = "name='UploadTemplateDirectory'";
            $arr_upl['sort'] = FALSE;
            $arr_upl['dir'] = FALSE;
            $arr_upl['start'] = FALSE;
            $arr_upl['limit'] = FALSE;

            $arr_uploaddir = page_model::select_where_order_limit($query_type, $arr_upl, $fetch_type);

            $arr_upl['table'] = 'template';
            $arr_upl['filds'] = 'source';
            $arr_upl['where'] = "id='" . strip_tags($_REQUEST['idrow']) . "'";
            $arr_upl['sort'] = FALSE;
            $arr_upl['dir'] = FALSE;
            $arr_upl['start'] = FALSE;
            $arr_upl['limit'] = FALSE;

            $arr_file_old = page_model::select_where_order_limit($query_type, $arr_upl, $fetch_type);
            $uploadfile_new = $arr_uploaddir[0] . basename($_FILES['input_file']['name']);

            if (move_uploaded_file($_FILES['input_file']['tmp_name'], $uploadfile_new)) {
//                if (file_exists($arr_file_old[0])) {
//                    $result_del = unlink($arr_file_old[0]);
//                    if (!$result_del) {
//                        return '{"success": false, "message": " error deleting file"}';
//                    }
//                }
            } else {
                if ($_FILES['input_file']['error'] > 0 and $_FILES['input_file']['error'] != 4) {
                    return '{"success": false, "message": "Upload file error"}';
                }
            }
//echo $_FILES['input_file']['error'];
            $arr_data['table'] = strip_tags($_REQUEST['table']);
            $arr_set['name'] = strip_tags($_REQUEST['template_name']);
            $arr_set['descr'] = strip_tags($_REQUEST['template_descr']);
            if (isset($uploadfile_new)) {
                $arr_set['source'] = $uploadfile_new;
            } else {
                if (isset($arr_set['source'])) {
                    unset($arr_set['source']);
                }
            }

            $arr_tmp['market_code'] = strip_tags($_REQUEST['market_code']);
            $arr_tmp['specialization_value'] = strip_tags($_REQUEST['specialization_value']);
            $arr_tmp['templatetype_value'] = strip_tags($_REQUEST['templatetype_value']);

            foreach ($arr_tmp as $key => $value) {
                if (preg_match('/_/', $key)) {
                    $arr_key = explode("_", $key);

                    switch ($arr_key[0]) {
                        case 'market':
                            $fetch_type = 'num';
                            $query_type = 'select_one';
                            $arr_market['table'] = $arr_key[0];
                            $arr_market['filds'] = "id";
                            $arr_market['where'] = "code='" . $arr_tmp['market_code'] . "'";
                            $arr_market['sort'] = FALSE;
                            $arr_market['dir'] = FALSE;
                            $arr_market['start'] = FALSE;
                            $arr_market['limit'] = FALSE;

                            $data_market = page_model::select_where_order_limit($query_type, $arr_market, $fetch_type);
                            if (isset($data_market) and $data_market) {
                                $arr_set['market_id'] = $data_market[0];
                            }
                            break;
                        case 'specialization':
                            $fetch_type = 'num';
                            $query_type = 'select_one';
                            $arr_spec['table'] = $arr_key[0];
                            $arr_spec['filds'] = "id";
                            $arr_spec['where'] = "value='" . $arr_tmp['specialization_value'] . "'";
                            $arr_spec['sort'] = FALSE;
                            $arr_spec['dir'] = FALSE;
                            $arr_spec['start'] = FALSE;
                            $arr_spec['limit'] = FALSE;

                            $data_spec = page_model::select_where_order_limit($query_type, $arr_spec, $fetch_type);
                            if (isset($data_spec) and $data_spec) {
                                $arr_set['spec_id'] = $data_spec[0];
                            }
                            break;
                        case 'templatetype':
                            $fetch_type = 'num';
                            $query_type = 'select_one';
                            $arr_type['table'] = $arr_key[0];
                            $arr_type['filds'] = "id";
                            $arr_type['where'] = "value='" . $arr_tmp['templatetype_value'] . "'";
                            $arr_type['sort'] = FALSE;
                            $arr_type['dir'] = FALSE;
                            $arr_type['start'] = FALSE;
                            $arr_type['limit'] = FALSE;

                            $data_type = page_model::select_where_order_limit($query_type, $arr_type, $fetch_type);
                            if (isset($data_type) and $data_type) {
                                $arr_set['type_id'] = $data_type[0];
                            }
                            break;
                    }
                }
            }
            $query_type = 'update';
            $arr_data['where'] = "id='" . strip_tags($_REQUEST['idrow']) . "'";
            $data = page_model::update_formwin($query_type, $arr_data, $arr_set);

            list($id_title, $data) = page_controller::data_larger($data);
            view::ajax_view($data, $id_title);
        } else {                                  //-------------------------------------                           //        'add';
            $fetch_type = 'num';
            $query_type = 'select_one';

            $arr_upl['table'] = 'params';
            $arr_upl['filds'] = 'value';
            $arr_upl['where'] = "name='UploadTemplateDirectory'";
            $arr_upl['sort'] = FALSE;
            $arr_upl['dir'] = FALSE;
            $arr_upl['start'] = FALSE;
            $arr_upl['limit'] = FALSE;

            $arr_uploaddir = page_model::select_where_order_limit($query_type, $arr_upl, $fetch_type);
            $uploadfile = $arr_uploaddir[0] . basename($_FILES['input_file']['name']);

            if (move_uploaded_file($_FILES['input_file']['tmp_name'], $uploadfile)) {

                $arr_request['func'] = strip_tags($_REQUEST['func']);

                if ($arr_request['func'] == 'add') {                 //    $arr_json['func'] == 'add' $arr_set['table']==template
                    $arr_data['table'] = strip_tags($_REQUEST['table']);
                    $arr_set['name'] = strip_tags($_REQUEST['template_name']);
                    $arr_set['descr'] = strip_tags($_REQUEST['template_descr']);
                    $arr_set['source'] = $uploadfile;

                    $arr_tmp['market_code'] = strip_tags($_REQUEST['market_code']);
                    $arr_tmp['specialization_value'] = strip_tags($_REQUEST['specialization_value']);
                    $arr_tmp['templatetype_value'] = strip_tags($_REQUEST['templatetype_value']);

                    foreach ($arr_tmp as $key => $value) {
                        if (preg_match('/_/', $key)) {
                            $arr_key = explode("_", $key);

                            switch ($arr_key[0]) {
                                case 'market':
                                    $fetch_type = 'num';
                                    $query_type = 'select_one';
                                    $arr_market['table'] = $arr_key[0];
                                    $arr_market['filds'] = "id";
                                    $arr_market['where'] = "code='" . $arr_tmp['market_code'] . "'";
                                    $arr_market['sort'] = FALSE;
                                    $arr_market['dir'] = FALSE;
                                    $arr_market['start'] = FALSE;
                                    $arr_market['limit'] = FALSE;

                                    $data_market = page_model::select_where_order_limit($query_type, $arr_market, $fetch_type);
                                    if (isset($data_market) and $data_market) {
                                        $arr_set['market_id'] = $data_market[0];
                                    }
                                    break;
                                case 'specialization':
                                    $fetch_type = 'num';
                                    $query_type = 'select_one';
                                    $arr_spec['table'] = $arr_key[0];
                                    $arr_spec['filds'] = "id";
                                    $arr_spec['where'] = "value='" . $arr_tmp['specialization_value'] . "'";
                                    $arr_spec['sort'] = FALSE;
                                    $arr_spec['dir'] = FALSE;
                                    $arr_spec['start'] = FALSE;
                                    $arr_spec['limit'] = FALSE;

                                    $data_spec = page_model::select_where_order_limit($query_type, $arr_spec, $fetch_type);
                                    if (isset($data_spec) and $data_spec) {
                                        $arr_set['spec_id'] = $data_spec[0];
                                    }
                                    break;
                                case 'templatetype':
                                    $fetch_type = 'num';
                                    $query_type = 'select_one';
                                    $arr_type['table'] = $arr_key[0];
                                    $arr_type['filds'] = "id";
                                    $arr_type['where'] = "value='" . $arr_tmp['templatetype_value'] . "'";
                                    $arr_type['sort'] = FALSE;
                                    $arr_type['dir'] = FALSE;
                                    $arr_type['start'] = FALSE;
                                    $arr_type['limit'] = FALSE;

                                    $data_type = page_model::select_where_order_limit($query_type, $arr_type, $fetch_type);
                                    if (isset($data_type) and $data_type) {
                                        $arr_set['type_id'] = $data_type[0];
                                    }
                                    break;
                            }
                        }
                    }
                    $query_type = 'insert';
                    $data = page_model::insert_formwin($query_type, $arr_data, $arr_set);

                    list($id_title, $data) = page_controller::data_larger($data);
                }
                view::ajax_view($data, $id_title);
            } else {
                echo '{"success": false}';
            }
        }
    }

}

