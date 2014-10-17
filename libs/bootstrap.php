<?php

include __DIR__ . '/autoload/Loader.php';

$loader = new \Slave\Libs\Autoload\Loader();

/**
 * @param   $errno
 * @param   $errstr
 * @param   $errfile
 * @param   $errline
 * @Return  void
 */
set_error_handler(function ($errno, $errstr, $errfile, $errline) {

});

/**
 * @param   \Exception $exceptions
 * @return  void
 */
set_exception_handler(function (\Exception $exceptions)
{
    echo "error: " . $exceptions->getMessage() . "\n";
    die;
});

return $loader;
