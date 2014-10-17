<?php
/**
 * Created by PhpStorm.
 * User: JanHuang
 * Date: 2014/10/16 0016
 * Time: 下午 9:54
 * Blog: http://blog.segmentfault.com/janhuang
 * Github: https://www.github.com/janhuang
 * Coding.net: https://www.coding.net/janhuang
 */

namespace Slave\Libs\Facade;

use Libs\Configuration\Configuration;
use Libs\Core\Facade\FacadeAbstract;
use Slave\Libs\Commands\CommandInvoker;
use Slave\Libs\Commands\CommandReceiver;

/**
 * Class CommandHandleFacade
 * @package Slave\Libs\Facade
 */
class CommandHandleFacade extends FacadeAbstract
{
    /**
     * @var     string
     */
    protected $input;

    /**
     * @var     \Libs\Core\Commands\CommandInvoker
     */
    protected $invoker;

    /**
     * @var     array
     */
    protected $commands = [];

    /**
     * @param   \Libs\Configuration\Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $commands = $configuration->getConfig('accept-commands');

        $binDir = str_replace('//', DIRECTORY_SEPARATOR, __DIR__ . '/../../' . $configuration->getConfig('bin-dir'));

        $this->invoker = new CommandInvoker();
        $receiver = new CommandReceiver();

        foreach ($commands as $key => $val) {
            if (file_exists("{$binDir}/{$val['name']}") && !class_exists($val['class'])) {
                include "{$binDir}/{$val['name']}";
            }

            $this->commands[$val['name']] = new $val['class']($receiver);
        }
    }

    /**
     * @param   string  $command
     * @return  bool|\Libs\Core\Commands\CommandsInterface
     */
    public function getCommand($command)
    {
        return isset($this->commands[$command]) ? $this->commands[$command] : false;
    }

    /**
     * @param   string  $input
     * @return  \Libs\Core\Facade\FacadeAbstract
     */
    public function handle($input)
    {
        $this->input = $input;

        return $this;
    }

    /**
     * @return \Libs\Core\Facade\FacadeAbstract
     */
    public function activate()
    {
        if (false === ($command = $this->getCommand($this->input))) {
            return false;
        }

        $this->invoker->setCommand($command);

        return $this->invoker->executeCommand();
    }
} 