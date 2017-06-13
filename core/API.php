<?php

/**
 * Created by PhpStorm.
 * User: snowgirl
 * Date: 6/13/17
 * Time: 7:40 PM
 */
namespace CORE;

use CORE\TripBuilder\Output;
use CORE\TripBuilder\Strategy;

/**
 * Class API
 * @package CORE
 */
class API
{
    /**
     * @todo validations..
     * @todo exceptions handlers..
     * @todo ...
     *
     * @param $cards
     * @param $strategy
     * @param $output
     * @return string
     */
    public function getSortedCards($cards, $strategy, $output)
    {
//        echo '<pre>';
//        print_r($cards);

        $cards = Card::factoryMulti($cards);

//        var_dump($cards);die;

        /** @var Strategy $strategy */
        $strategy = Strategy::factoryFromString($strategy);

        /** @var Output $output */
        $output = Output::factoryFromString($output);

        $builder = new TripBuilder($cards);

        $cards = $builder->processWith($strategy);

        return $output->process($cards);
    }

    public function getUnknown()
    {
        return 'So simple stuff and you do not know how to use it? Really? ...';
    }
}