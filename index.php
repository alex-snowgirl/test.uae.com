<?php
use CORE\APP;
use CORE\API;

require_once 'simple_boots.php';

/**
 * App using API(internal) somehow... Just for visibility...
 * So simple...
 * No requests
 * No parsing
 * No validations
 * No storage
 * No responses
 * ... A lot of "no/absent/not present/todo/implement" goes here...
 *
 * Usage:
 * 1) execute in the CMD- php -S 0.0.0.0:8080
 * 2) open in your fav browser this test or create your own:

 http://0.0.0.0:8080/?sort_cards&cards[0][from]=gerona-airport&cards[0][to]=stockholm&cards[0][type]=plane&cards[0][number]=sk455&cards[0][gate]=45b&cards[0][seat]=3a&cards[0][baggage]=344&cards[1][from]=stockholm&cards[1][to]=new-york-jfk&cards[1][type]=plane&cards[1][number]=sk22&cards[1][gate]=22&cards[1][seat]=7b&cards[1][baggage]=&cards[2][from]=madrid&cards[2][to]=barselona&cards[2][type]=train&cards[2][number]=78a&cards[2][seat]=45b&cards[3][from]=barselona&cards[3][to]=gerona-airport&cards[3][type]=bus&cards[3][seat]=

 */

echo new APP(function (API $api) {
    //some simple parsing :))
    if (isset($_GET['sort_cards'])) {
        return $api->getSortedCards(
            isset($_GET['cards']) ? $_GET['cards'] : array(),
            isset($_GET['strategy']) ? $_GET['strategy'] : 'easy',
            isset($_GET['output']) ? $_GET['output'] : 'easy'
        );
    }

    return $api->getUnknown();
});