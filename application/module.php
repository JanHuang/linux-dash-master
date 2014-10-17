<?php
/**
 * Created by PhpStorm.
 * User: JanHuang
 * Date: 2014/10/17 0017
 * Time: 上午 12:42
 * Blog: http://blog.segmentfault.com/janhuang
 * Github: https://www.github.com/janhuang
 * Coding.net: https://www.coding.net/janhuang
 */

$socket = include __DIR__ . "/../scripts/master/sbin/client.php";

$host = isset($_GET['host']) ? (int)$_GET['host'] : 0;

$socket->connect($configuration->getConfig("slave.{$host}.host"), $configuration->getConfig("slave.{$host}.port"));

$socket->send($socket->getSocket(), $_GET['module']);

echo $socket->read($socket->getSocket());

exit;
