<?php
/**
 * Created by PhpStorm.
 * ClassName: InvokerInterface
 * User: JAN
 * Date: 14-10-15
 * Time: 下午6:43
 * Link: http://blog.segmentfault.com/janhuang
 */

namespace Libs\Core\Commands;

/**
 * Interface InvokerInterface
 * @package Libs\Commands
 */
interface InvokerInterface
{
    /**
     * @return mixed
     */
    public function executeCommand();
} 