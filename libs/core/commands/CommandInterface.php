<?php

namespace Libs\Core\Commands;

/**
 * Interface CommandInterface
 * @package Libs\Core\Commands
 */
interface CommandInterface
{
    /**
     * @return mixed
     */
    public function execute();
}