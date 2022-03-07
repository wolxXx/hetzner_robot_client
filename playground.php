<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
$config = require __DIR__ . DIRECTORY_SEPARATOR . 'local.php';
$client = \HetznerRobotClient\Client::Factory(
    \HetznerRobotClient\Configuration::Factory($config['username'], $config['password'])
                                     ->setDebugRequests(true)
    ->setHost('http://localhost:8000')
);
var_dump($client->getAllStorageBoxes());