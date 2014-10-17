<?php

namespace Libs\Core\Commands;

/**
 * Class CommandAbstract
 * @package Libs\Core\Commands
 */
abstract class CommandAbstract implements CommandInterface
{
    /**
     * @var
     */
    protected $receiver;

    /**
     * @param ReceiverAbstract $receiverAbstract
     */
    public function __construct(ReceiverAbstract $receiverAbstract)
    {
        $this->receiver = $receiverAbstract;
    }

    /**
     * @return mixed
     */
    abstract function execute();
}