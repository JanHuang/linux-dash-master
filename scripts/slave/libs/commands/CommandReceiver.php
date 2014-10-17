<?php
/**
 * Created by PhpStorm.
 * User: JanHuang
 * Date: 2014/10/15 0015
 * Time: 下午 9:54
 * Blog: http://blog.segmentfault.com/janhuang
 * Github: https://www.github.com/janhuang
 * Coding.net: https://www.coding.net/janhuang
 */

namespace Slave\Libs\Commands;

use Libs\Core\Commands\ReceiverAbstract;

/**
 * Class CommandReceiver
 *
 * @package Slave\Libs\Commands
 */
class CommandReceiver extends ReceiverAbstract
{
    public function output($output)
    {
        if (!$output) {
            $data = [
                'status' => -1,
                'message' => 'Query fial.'
            ];
        } else {
            $data = [
                'status' => 1,
                'message' => 'OK',
                'content' => $output
            ];
        }
        return json_encode($data);
    }
} 