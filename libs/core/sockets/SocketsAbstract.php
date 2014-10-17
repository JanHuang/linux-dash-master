<?php
/**
 * Created by PhpStorm.
 * User: JanHuang
 * Date: 2014/10/14 0014
 * Time: 下午 10:14
 * Blog: http://blog.segmentfault.com/janhuang
 * Github: https://www.github.com/janhuang
 * Coding.net: https://www.coding.net/janhuang
 */

namespace Libs\Core\Sockets;
use Libs\Exceptions\SocketsException;

/**
 * Class SocketsAbstract
 * @package Libs\Sockets
 */
abstract class SocketsAbstract
{
    /**
     * Create sockets configuration.
     *
     * @var     array
     */
    private $config = [];

    /**
     * Sockets resource.
     *
     * @var     Resource
     */
    private $socket = null;

    /**
     * Create sockets host address.
     *
     * @var     string
     */
    protected $host;

    /**
     * Create sockets host port code.
     *
     * @var     integer
     */
    protected $port;

    /**
     * Sockets authorized visit user.
     *
     * @var     string
     */
    protected $user;

    /**
     * Sockets authorized visit user password.
     *
     * @var     string
     */
    protected $pwd;

    /**
     * Create sockets error.
     *
     * @var     string
     */
    protected $error = '';

    public function __construct(\Libs\Configuration\Configuration $configuration)
    {
        $this->config = $configuration;
    }

    /**
     * Set \Libs\Configuration\Configuration
     *
     * @param array $config
     * @return \Libs\Core\Sockets\SocketsAbstract
     */
    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Get \Libs\Configuration\Configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Resource $socket
     * @return \Libs\Core\Sockets\SocketsAbstract
     */
    public function setSocket($socket)
    {
        $this->socket = $socket;

        return $this;
    }

    /**
     * Get socket resource handle.
     *
     * @return Resource
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * Create socket.
     *
     * @return  $this|SocketsAbstract
     * @throws  \Libs\Exceptions\SocketsException
     */
    public function create()
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        if (!$this->socket) {
            throw new SocketsException("create socket failed:" . socket_strerror(socket_last_error()));
        }

        if (!socket_set_block($this->socket)) {
            throw new SocketsException("block failed:" . socket_strerror(socket_last_error()));
        }

        return $this;
    }

    /**
     * Try bind socket.
     *
     * @param   $host
     * @param   $port
     * @return  mixed
     */
    public function bind($host, $port){}

    /**
     * Try listen create socket.
     *
     * @return  mixed
     */
    public function listen(){}

    /**
     * Try connect socket client.
     *
     * @param   $host
     * @param   $port
     * @return  mixed
     */
    public function connect($host, $port){}

    /**
     * Read client write action.
     *
     * @param     $socket
     * @param   int     $length
     * @return  string
     */
    public function read($socket, $length = 8192)
    {
        return socket_read($socket, $length);
    }

    /**
     * Send message to client.
     *
     * @param   resource
     * @param   string
     * @return  bool
     */
    public function send($socket, $message)
    {
        return socket_write($socket, $message, strlen($message));
    }

    /**
     * Close current sockets connected.
     *
     * @param   resource    $socket
     * @return  bool
     */
    public function close($socket)
    {
        return socket_close($socket);
    }

    /**
     * Set sockets error information.
     *
     * @param   string
     * @return  \Libs\Core\Sockets\SocketsAbstract
     */
    public function setError($error)
    {
        $this->error = $error . "\n";

        return $this;
    }

    /**
     * Get sockets error information.
     *
     * @return  \Libs\Core\Sockets\SocketsAbstract
     */
    public function getError()
    {
        return $this->error ?: socket_strerror(socket_last_error());
    }
}