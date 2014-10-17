<?php

$dir = dirname(__DIR__);
$scripts = dirname($dir);

return [
    "\\Libs\\Core\\Commands"    => $dir . '/core/commands',
    "\\Libs\\Core\\Sockets"     => $dir . '/core/sockets',
    "\\Libs\\Core\\Facade"     => $dir . '/core/facade',
    "\\Libs\\Configuration"     => $dir . '/configuration',
    "\\Libs\\Exceptions"        => $dir . '/exceptions',
    "\\Slave\\Libs\\Commands"   => $scripts . '/scripts/slave/libs/commands',
    "\\Slave\\Libs\\Facade"     => $scripts . '/scripts/slave/libs/facade',
    "\\Slave\\Libs"             => $scripts . '/scripts/slave/libs',
    "\\Slave\\Bin"              => $scripts . '/scripts/slave/bin',
    "\\Master\\Libs"            => $scripts . '/scripts/master/libs',
    "\\Master\\Bin"             => $scripts . '/scripts/master/bin',
];
