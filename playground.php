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
foreach ($storageBoxCollection->getItems() as $item) {
    $box = $client->getStorageBox($item->getId());
    var_dump($item);
    var_dump($client->getStorageBoxSubAccounts($item));
    $created = $client->createStorageBoxSubAccount(
        \HetznerRobotClient\Request\StorageBox\SubAccount\Create\Parameters::Factory()
                                                                           ->setStorageBox($item)
                                                                           ->setSamba(false)
                                                                           ->setSsh(true)
                                                                           ->setExternalReachability(true)
                                                                           ->setWebdav(true)
                                                                           ->setComment('foooobaaaazzzz')
                                                                           ->setHomeDirectory('backups')
                                                                           ->setReadonly(true)
    );
    var_dump($created);
    var_dump($client->deleteStorageBoxSubAccount(
        \HetznerRobotClient\Request\StorageBox\SubAccount\Delete\Parameters::Factory()
        ->setStorageBox($box)
        ->setUserName($created->getUserName())
    ));
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
