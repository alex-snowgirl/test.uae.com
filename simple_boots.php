<?php
/**
 * Simple(!) init logic:
 * 1) Default timezone = Europe/Kiev
 * 2) Default error log file = app.log
 * 3) All errors will thrown exceptions
 * 4) All exceptions will be logged into default log file
 * 5) Last error will be logged into default log file
 * 6) Classes autoload (composer)
 */

date_default_timezone_set('Europe/Kiev');
ini_set('error_log', __DIR__ . '/app.log');

function LogMeFaster($text)
{
    error_log($text . "\n", 3, ini_get('error_log'));
}

set_error_handler(function ($num, $str, $file, $line) {
    throw new Exception(join(' - ', array_slice(func_get_args(), 0, 4)));
});

set_exception_handler(function (\Exception $ex) {
    LogMeFaster(join("\n", array(
        join(' - ', array($ex->getCode(), $ex->getMessage())),
        $ex->getTraceAsString()
    )));
});

register_shutdown_function(function () {
    if (!$e = error_get_last()) {
        return true;
    }

    LogMeFaster(join(' - ', $e));

    return true;
});

require_once 'vendor/autoload.php';