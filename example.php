<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
$username = '';
$password = '';

$username = '#ws+tyXqM8ka';
$password = 'HjXE@DUissNa42y';

$client               = \HetznerRobotClient\Client::Factory(
    \HetznerRobotClient\Configuration::Factory($username, $password)
);
$storageBoxCollection = $client->getAllStorageBoxes();
print_r($storageBoxCollection);
foreach ($storageBoxCollection->getItems() as $box) {
    $subAccountCollection = $client->getStorageBoxSubAccounts($box);
    print_r($subAccountCollection);
}

