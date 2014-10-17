<?php
/**
 * Created by PhpStorm.
 * ClassName: CommandInvoker
 * User: JAN
 * Date: 14-10-15
 * Time: 下午6:55
 * Link: http://blog.segmentfault.com/janhuang
 */

namespace Slave\Libs\Commands;

use Libs\Core\Commands\InvokerAbstract;

/**
 * Class CommandInvoker
 * @package Slave\Libs\Commands
 */
class CommandInvoker extends InvokerAbstract
{
    /**
     * @return mixed
     */
    public function executeCommand()
    {
        return $this->getCommand()->execute();
    }
} 