<?php

namespace Model;

use Fuel\Core\DB;

class Cards extends \Model {

    public static function get_results($id) {
        $query = DB::select()->where('deck_id', $id)->from('cards')->limit(3)->execute();
        return $query;
    }
    
    public static function total_strength($id) {
        $query = DB::query("SELECT SUM(strength) as str FROM cards WHERE deck_id={$id}")->execute();
        return $query;
    }
    
    public static function total_defence($id) {
        $query = DB::query("SELECT SUM(defence) as def FROM cards WHERE deck_id={$id}")->execute();
        return $query;
    }

}
