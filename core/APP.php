<?php

/**
 * Created by PhpStorm.
 * User: snowgirl
 * Date: 6/13/17
 * Time: 7:47 PM
 */
namespace CORE;

/**
 * So simple...
 * Class APP
 * @package CORE
 */
class APP
{
    protected $someMiddlewareStuffBetweenAppAndApi;

    public function __construct(\Closure $someMiddlewareStuffBetweenAppAndApi)
    {
        $this->someMiddlewareStuffBetweenAppAndApi = $someMiddlewareStuffBetweenAppAndApi;
    }

    public function someAnotherMiddlewareStuffBetweenAppAndApi($output)
    {
        return $output;
    }

    public function __toString()
    {
        try {
            $output = call_user_func($this->someMiddlewareStuffBetweenAppAndApi, new API);
            return $this->someAnotherMiddlewareStuffBetweenAppAndApi($output);
        } catch (\Exception $ex) {
            echo '<pre>';
            return join("\r\n",array(
                $ex->getMessage(),
                $ex->getTraceAsString()
            ));
        }
    }
}