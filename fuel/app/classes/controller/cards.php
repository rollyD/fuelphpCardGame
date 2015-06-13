<?php

class controller_cards extends Controller {

    public function action_index() {
        $decks = new \Model\Decks;
        $decklist = $decks->get_decks(); //getting the list of all decks

        $cards = new Model\Cards;
        $cardslist = $cards->get_results(1);
        $get_strength = $cards->total_strength(1);
        $get_defence = $cards->total_defence(1);
        $str = $get_strength[0]['str']; //get the total strength
        $def = $get_defence[0]['def']; //get the total defence

        $view = View::forge('layout');

        //local view variables, lazy rendering
        $view->content = View::forge('cards/index', array('decks' => $decklist, 'cards' => $cardslist, 'strength' => $str, 'defence' => $def));

        // return the view object to the Request
        return $view;
    }

    public function action_deck() {
        $deck_id = $_POST['deck'];
        $result = array();
        
        $decks = new Model\Decks;
        $newdeck = $decks->get_deckinfo($_POST['deck']); //getting the list of all decks
        
        $cards = new Model\Cards;
        $cardslist = $cards->get_results($deck_id);
        
        $get_strength = $cards->total_strength($deck_id);
        $get_defence = $cards->total_defence($deck_id);
        $str = $get_strength[0]['str']; //get the total strength
        $def = $get_defence[0]['def']; //get the total defence
        
        //storing cards on array
        $cards_array = array();
        $skills_array = array();
        foreach ($cardslist as $card):
            $cards_array[] = $card['card_name'];
            $skills_array[] = $card['skills'];
        endforeach;
        
        $result['skills'] = $skills_array;
        $result['cards'] = $cards_array;
        $result['strength'] = $str;
        $result['defence'] = $def;
        $result['deck'] = $newdeck[0]['deck_number'];

        return json_encode($result);
    }

}
