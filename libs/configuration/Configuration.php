<?php

namespace Libs\Configuration;

/**
 * Class Configuration
 * @package Slave\Libs\Configuration
 */
class Configuration
{
    /**
     * @var null|Configuration
     */
    private static $instance = null;

    /**
     * @var array|mixed
     */
    private $config = [];

    /**
     * @param   string  $configure
     */
    public function __construct($configure)
    {
        $this->config = json_decode(file_get_contents($configure), true);
    }

    /**
     * @param   $key
     * @return  array|mixed
     */
    public function getConfig($key)
    {
        $array = explode(".", $key);

        $configValue = $this->config;

        foreach ($array as $val) {

            $configValue = $configValue[$val];

        }

        return $configValue;
    }

    /**
     * @param   $key
     * @param   $value
     * @return  $this
     */
    public function setConfig($key, $value)
    {
        $this->config[$key] = $value;

        return $this;
    }
}
