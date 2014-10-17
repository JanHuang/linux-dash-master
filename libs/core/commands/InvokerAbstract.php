<?php

namespace Libs\Core\Commands;

/**
 * Class    InvokerAbstract
 * @package Libs\Core\Commands
 */
abstract class InvokerAbstract implements InvokerInterface
{
    /**
     * @var \Libs\Core\Commands\CommandInterface
     */
    private $command = null;

    /**
     * @param   \Libs\Core\Commands\CommandInterface
     * @return  \Libs\Core\Commands\InvokerAbstract
     */
    public function setCommand(CommandInterface $commandInterface)
    {
        $this->command = $commandInterface;

        return $this;
    }

    /**
     * @return \Libs\Core\Commands\CommandInterface
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @return mixed
     */
    abstract function executeCommand();
}

