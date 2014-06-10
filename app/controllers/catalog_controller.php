<?php if (!defined('READFILE')) exit('No direct script access allowed');

class catalog_controller extends controller {

    public static function index() {

        $data['title_page'] = catalog_model::get_title();
        list($data['menu_header'], $data['menu_footer']) = common_model::get_menus(FALSE);
//        $data['list_phones'] = catalog_model::get_list_phones();
        $data['content'] = catalog_model::get_list_phones();

        self::render($data);
    }

    protected static function render($data) {
//        $file_path = 'app/views/catalog_view.php';
//        include_once $file_path;
        self::view('catalog_view', FALSE, $data);
    }


}
/* End of file  */

