<?php
/**
 * Created by PhpStorm.
 * User: JanHuang
 * Date: 2014/10/14 0014
 * Time: 下午 11:28
 * Blog: http://blog.segmentfault.com/janhuang
 * Github: https://www.github.com/janhuang
 * Coding.net: https://www.coding.net/janhuang
 */

$loader = include __DIR__ . '/../../../libs/bootstrap.php';

$configuration = new \Libs\Configuration\Configuration(__DIR__ . '/../config/config.json');

$socket = new \Master\Libs\MasterSocket($configuration);

$socket->create();

return $socket;
