<?php
namespace Model;
use Fuel\Core\DB;

class Users extends \Model {

    public static function get_results()
    {
     $query = DB::select()->from('users')->execute();
     return $query;
    }

}
