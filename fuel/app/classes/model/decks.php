<?php
namespace Model;
use Fuel\Core\DB;

class Decks extends \Model {

    public static function get_decks() {
        $query = \DB::select()->from('decks')->execute();
        return $query;
    }
    
    public static function get_deckinfo($deck_id) {
        $query = DB::select()->from('decks')->where('deck_id', $deck_id)->execute();
        return $query;
    }
}
