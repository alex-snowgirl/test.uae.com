Very simple implementation - made an effort with OOP...
A lot of TODOs - ready to discuss and answer any questions...

Due to luck of time - i've missed tests part.. sorry
(do not have a lot of exp with TDD - but this is not a problem for me.. ready to work with...)

All source code is mine, except composer
Total spent: 2 hours 13 mins
------------------------------Usage--------------------:
1) setup build-in PHP web-server (or what kind of you have), execute in the CMD:

php -S 0.0.0.0:8080

2) install composer for auto-loading, execute in the CMD:

composer install

3) open in your fav browser this test or create your own:

http://0.0.0.0:8080/?sort_cards&cards[0][from]=gerona-airport&cards[0][to]=stockholm&cards[0][type]=plane&cards[0][number]=sk455&cards[0][gate]=45b&cards[0][seat]=3a&cards[0][baggage]=344&cards[1][from]=stockholm&cards[1][to]=new-york-jfk&cards[1][type]=plane&cards[1][number]=sk22&cards[1][gate]=22&cards[1][seat]=7b&cards[1][baggage]=&cards[2][from]=madrid&cards[2][to]=barselona&cards[2][type]=train&cards[2][number]=78a&cards[2][seat]=45b&cards[3][from]=barselona&cards[3][to]=gerona-airport&cards[3][type]=bus&cards[3][seat]=

As you can see - input format - standard multi-dimensional query (GET) - so please use such format

------------------------------Example of input data----:

Array
(
    [0] => Array
        (
            [from] => gerona-airport
            [to] => stockholm
            [type] => plane
            [number] => sk455
            [gate] => 45b
            [seat] => 3a
            [baggage] => 344
        )

    [1] => Array
        (
            [from] => stockholm
            [to] => new-york-jfk
            [type] => plane
            [number] => sk22
            [gate] => 22
            [seat] => 7b
            [baggage] =>
        )

    [2] => Array
        (
            [from] => madrid
            [to] => barselona
            [type] => train
            [number] => 78a
            [seat] => 45b
        )

    [3] => Array
        (
            [from] => barselona
            [to] => gerona-airport
            [type] => bus
            [seat] =>
        )

)

------------------------------Example of output data----:

1. Take train 78a from madrid to barselona. Sit in seat 45b.
2. Take the airport bus from barselona to gerona-airport. No seat assignment.
3. From gerona-airport, take flight sk455 to stockholm. Gate 45b, seat 3a.
Baggage drop at ticket counter 344.
4. From stockholm, take flight sk22 to new-york-jfk. Gate 22, seat 7b.
Baggage will we automatically transferred from your last leg.
5. You have arrived at your final destination.
