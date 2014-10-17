<?php

namespace Libs\Core\Commands;

/**
 * Class ReceiverAbstract
 * @package Libs\Core\Commands
 */
abstract class ReceiverAbstract
{
    /**
     * @return  mixed
     */
    public function output($output)
    {
        return $output;
    }
}
