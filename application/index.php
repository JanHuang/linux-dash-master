<?php

$socket = include __DIR__ . "/../scripts/master/client.php";

$host = isset($_GET['host']) ? (int)$_GET['host'] : 0;

$defaultHost = $socket->getConfig()->getConfig("slave.{$host}.host");

$hosts = $socket->getConfig()->getConfig('slave');

include "index.html";
