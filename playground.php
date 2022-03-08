<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
$config               = require __DIR__ . DIRECTORY_SEPARATOR . 'local.php';
$listBody             = [
    [
        'storagebox' => [
            'id'            => 1,
            'login'         => 'login1',
            'name'          => 'name1',
            'product'       => 'storagebox',
            'cancelled'     => false,
            'locked'        => false,
            'location'      => 'narnia',
            'linked_server' => 1234,
            'paid_until'    => '2020-01-02 12:34:56',
        ],
    ],
];
$getBody              = [
    0 => [
        'id'            => 1,
        'login'         => 'login1',
        'name'          => 'name1',
        'product'       => 'storagebox',
        'cancelled'     => false,
        'locked'        => false,
        'location'      => 'narnia',
        'linked_server' => 1234,
        'paid_until'    => '2020-01-02 12:34:56',
    ],
];
$mock                 = new \GuzzleHttp\Handler\MockHandler([
    new \GuzzleHttp\Psr7\Response(200, [], \json_encode($listBody, \JSON_PRETTY_PRINT)),
    new \GuzzleHttp\Psr7\Response(200, [], \json_encode($getBody, \JSON_PRETTY_PRINT)),
]);
$handlerStack         = \GuzzleHttp\HandlerStack::create($mock);
$client               = \HetznerRobotClient\Client::Factory(
    \HetznerRobotClient\Configuration::Factory($config['username'], $config['password'])
                                     ->setDebugRequests(true)
#     ->setMockHandler($handlerStack)
# ->setHost('http://localhost:8000')
);
$storageBoxCollection = $client->getAllStorageBoxes();
var_dump($storageBoxCollection);
foreach ($storageBoxCollection->getItems() as $item) {
    $box = $client->getStorageBox($item->getId());
    var_dump($box);
    continue;
    $client->updateStorageBox(
        (new \HetznerRobotClient\Request\UpdateStorageBox\Parameters())
            ->setId($item->getId())
            ->setNewName('SB_' . $item->getId())
            ->setSsh(true)
            ->setExternalReachability(true)
            ->setWebdav(true)
            ->setSamba(true)
            ->setZfs(true)
    );
}