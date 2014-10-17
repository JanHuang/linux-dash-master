<?php
/**
 * Created by PhpStorm.
 * ClassName: MasterSocket
 * User: JAN
 * Date: 14-10-15
 * Time: 上午11:47
 * Link: http://blog.segmentfault.com/janhuang
 */

namespace Master\Libs;

use Libs\Core\Sockets\SocketsAbstract;

class MasterSocket extends SocketsAbstract
{
    public function connect($host = '', $port = '')
    {
        return socket_connect($this->getSocket(), $host, $port);
    }
} 