<?php  if ( ! defined('READFILE')) exit('No direct script access allowed');

class model {

    public static $dbh;

    protected static function conect_start() {
        $path_config = 'app/config/config.xml';

        if (file_exists($path_config)) {
            $db_config = simplexml_load_file($path_config);
        }

        try {
//            $this->database = new PDO("mysql:host={$DB['host']};dbname={$DB['dbname']};charset=utf8", $DB['user'], $DB['password']);
            $dsn = 'mysql:host=' . $db_config->DBHostAddress . ';dbname=' . $db_config->Database;
            $options = array(PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            self::$dbh = new PDO($dsn, $db_config->DBUserName, $db_config->DBUserPassword, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

//$arr_data массив вида:
//Array
//(
//    [0] => Array([0] => aaa, [1] => bbb, [2] => ccc, [3] => ddd)
//    [1] => Array([0] => aaa, [1] => bbb, [2] => ccc, [3] => ddd)
//)
//$query_sql = "INSERT INTO table_name (col_a, col_b, col_c, col_d) values (?, ?, ?, ?);

    public static function set_values($query_sql, $arr_data) {
        self::conect_start();

        $sth = self::$dbh->prepare($query_sql);
        $response = '';
        foreach ($arr_data as $value) {
            $response += $sth->execute($value);
            $arr_error = $sth->errorInfo();
            $arr_error[2] ? print_r($arr_error[2]) : '';   // вывод ошибки
        }
        return $response;
    }

    public static function get_result($query_sql, $query_type, $data_sql = FALSE, $fetch_type = FALSE) {

        self::conect_start();
        switch ($query_type) {
            case 'count': case 'select_max':
                $sth = self::$dbh->query($query_sql);
                $response = $sth->fetchColumn();
                $arr_error = self::$dbh->errorInfo();
                $arr_error[2] ? print_r($arr_error[2]) : '';
                break;
            case 'select_order':
                $sth = self::$dbh->prepare($query_sql);
                $sth->execute();

                $response = $sth->fetchAll(PDO::FETCH_ASSOC);

                $arr_error = $sth->errorInfo();
                $arr_error[2] ? print_r($arr_error[2]) : '';   // вывод ошибки
//print_r($response);
                break;
            case 'update':
                $sth = self::$dbh->prepare($query_sql);
                $response = $sth->execute();
                $arr_error = $sth->errorInfo();
                $arr_error[2] ? print_r($arr_error[2]) : '';   // вывод ошибки
//echo '  ======| update |====== ';
//                $sth = self::$dbh->prepare($query_sql);
//                $response = self::$dbh->exec($data_sql);
//                $response = self::$dbh->exec(implode("','",$data_sql));

                break;

            case 'insert':
                $sth = self::$dbh->prepare($query_sql);
                $response = $sth->execute();
                $arr_error = $sth->errorInfo();
                $arr_error[2] ? print_r($arr_error[2]) : '';   // вывод ошибки
                break;
            case 'select_one':
                $sth = self::$dbh->prepare($query_sql);
                $sth->execute();
                if ($fetch_type) {
                    $response = $sth->fetch(PDO::FETCH_NUM);
                } else {
                    $response = $sth->fetch(PDO::FETCH_ASSOC);
                }
                $arr_error = self::$dbh->errorInfo();
                $arr_error[2] ? print_r($arr_error[2]) : '';
                break;
            case 'delete':
                $response = self::$dbh->exec($query_sql);
                $arr_error = self::$dbh->errorInfo();
                $arr_error[2] ? print_r($arr_error[2]) : '';
                break;
        }
        self::$dbh = null;
        return $response;
    }

}

/* End of file  */

