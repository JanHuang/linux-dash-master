<?php
/**
 * Created by PhpStorm.
 * User: JanHuang
 * Date: 2014/10/16 0016
 * Time: 下午 9:51
 * Blog: http://blog.segmentfault.com/janhuang
 * Github: https://www.github.com/janhuang
 * Coding.net: https://www.coding.net/janhuang
 */

namespace Libs\Core\Facade;

use Libs\Configuration\Configuration;

/**
 * Class    FacadeAbstract
 * @package Libs\Core\Facade
 */
abstract class FacadeAbstract
{
    /**
     * @param \Libs\Configuration\Configuration
     */
    abstract function __construct(Configuration $configuration);

    /**
     * @param   string    $input
     * @return  mixed
     */
    abstract function handle($input);

    /**
     * @return  mixed
     */
    abstract function activate();
} 