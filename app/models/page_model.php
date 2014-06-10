<?php  if ( ! defined('READFILE')) exit('No direct script access allowed');

class page_model extends model {

    public static function get_page($target) {

        switch ($target) {
            case 'warranty':
            case 'shipment_payment':
            case 'shops':
            case 'contact':
                $query_type = 'select_one';
                $arr_data['filds'] = '`menu`.`title_page`, `page`.`content`, `menu`.`title_name`';
                $arr_data['table'] = '`menu`, `page`';
                $arr_data['where'] = "`page`.`id_menu` = `menu`.`id` AND `menu`.`aliase`='".$target."'";
                $arr_data['sort'] = FALSE;
                $arr_data['dir'] = FALSE;
                $arr_data['start'] = FALSE;
                $arr_data['limit'] = FALSE;

                $arr_page = common_model::select_one($arr_data, $query_type, FALSE, FALSE);
                return array($arr_page['title_page'], self::html_page($arr_page['title_name'], $arr_page['content']));

                break;
        }
    }
    
    protected static function html_page($title_name,$content){
        $box_html = '<h1>'.$title_name.'</h1>'."\n".'<div>'.$content.'</div>';
        return $box_html;
    }

}

