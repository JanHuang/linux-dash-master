<?php

namespace Slave\Libs\Autoload;

/**
 * Class Loader
 * @package Slave\Libs\Autoload
 */
class Loader
{
    /**
     * @var array|mixed
     */
    private $maps = [];

    /**
     *
     */
    public function __construct()
    {
        $this->maps = include __DIR__ . '/maps.php';
        
        $this->registerLoader("loader");
    }

    /**
     * @param $method
     */
    private function registerLoader($method)
    {
        spl_autoload_register(array($this, $method), true);
    }

    /**
     * @param $class
     */
    private function loader($class)
    {
        foreach ($this->maps as $key => $val) {
            if (false !== (strrpos($class, trim($key, '\\')))) {
                $class = explode("\\", $class);
                $class = end($class);
                include str_replace("//", DIRECTORY_SEPARATOR, "{$val}/{$class}.php");
                break;
            }
        }
    }
}
