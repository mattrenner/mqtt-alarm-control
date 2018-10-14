#!/usr/bin/env php
<?php

use AlarmControl\Alarm;
use AlarmControl\Broker;
use AlarmControl\Model;
use React\Socket\Connector;

define ('DS', '/');
define ('SYS_ROOT', dirname(__FILE__) . DS);
define ('APP_ROOT', SYS_ROOT . 'app' . DS);

set_include_path(SYS_ROOT . PATH_SEPARATOR . get_include_path());
chdir(SYS_ROOT);

date_default_timezone_set('UTC');

$loader = require dirname(SYS_ROOT) . '/vendor/autoload.php';

$config = require dirname(SYS_ROOT) . '/config/conf.php';

/** @var \React\EventLoop\LoopInterface $loop */
$loop = React\EventLoop\Factory::create();
$connector = new Connector($loop);

$broker = new Broker($loop, $config['broker']['url']);

$alarm = new Alarm($loop, new Model\EliteSX(), $config['alarm']['url']);

$alarm->setBroker($broker);

$alarm->connect();
$broker->connect();

/**
 * $broker->on('command', function($d, $v){
    echo "Topic: $d - $v \n";
}); **/

$loop->run();