<?php

return array(
    '_root_' => 'cards/index', // The default route
    '_404_' => 'welcome/404', // The main 404 route
    'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
    'cards' => 'cards/index',
    'switch/deck' => 'cards/deck'
);
