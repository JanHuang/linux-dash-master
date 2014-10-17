<?php
/**
 * Created by PhpStorm.
 * User: JanHuang
 * Date: 2014/10/15 0015
 * Time: 上午 12:05
 * Blog: http://blog.segmentfault.com/janhuang
 * Github: https://www.github.com/janhuang
 * Coding.net: https://www.coding.net/janhuang
 */

namespace Slave\Libs;

use Libs\Core\Sockets\SocketsAbstract;
use Libs\Exceptions\SocketsException;
use Slave\Libs\Facade\CommandHandleFacade;

/**
 * Class SlaveSockets
 * @package Slave\Libs\SlaveSockets
 */
class SlaveSockets extends SocketsAbstract
{
    /**
     * Bind create sockets resource.
     *
     * @param   string
     * @param   int
     * @return  \Libs\Core\Sockets\SocketsAbstract
     */
    public function bind($host = '', $port = 0)
    {
        $host = $this->getConfig()->getConfig('server.host');

        $port = $this->getConfig()->getConfig('server.port');

        if (!socket_bind($this->getSocket(), $host, $port)) {
            return $this->setError("bind listen port failed:" . socket_strerror(socket_last_error()));
        }

        return $this;
    }

    /**
     * @return  \Libs\Core\Sockets\SocketsAbstract
     * @throws  SocketsException
     */
    public function listen()
    {
        if (!socket_listen($this->getSocket(), 4)) {
            throw new SocketsException("listen port failed:" . socket_strerror(socket_last_error()));
        }

        $commandsHandle = new CommandHandleFacade($this->getConfig());

        do {
            if (false === ($socket = socket_accept($this->getSocket()))) {
                throw new SocketsException("accept failed: reason" . socket_strerror(socket_last_error()));
            }

            $input = $this->read($socket);
            $result = $commandsHandle->handle($input)->activate();

            $this->send($socket, $result);

            $this->close($socket);
        } while (true);

        $this->close($this->getSocket());

        return $this;
    }
}
