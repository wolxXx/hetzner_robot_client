<?php

namespace HetznerRobotClientTest\Request;

class GetStorageBoxTest extends \PHPUnit\Framework\TestCase
{
    public function testGet()
    {
        $body         = [
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
        ];
        $mock         = new \GuzzleHttp\Handler\MockHandler([
            new \GuzzleHttp\Psr7\Response(200, [], \json_encode($body, \JSON_PRETTY_PRINT)),
        ]);
        $handlerStack = \GuzzleHttp\HandlerStack::create($mock);
        $config       = \HetznerRobotClient\Configuration::Factory('foo', 'bar')
                                                         ->setMockHandler($handlerStack);
        $result       = \HetznerRobotClient\Request\GetStorageBox::Factory($config)
                                                                 ->run(1)
                                                                 ->getResult();
        $this->assertSame('name1', $result->getName());
    }


    public function testNotFoundBehaviour()
    {
        $body         = [];
        $mock         = new \GuzzleHttp\Handler\MockHandler([
            new \GuzzleHttp\Psr7\Response(404, [], \json_encode($body, \JSON_PRETTY_PRINT)),
        ]);
        $handlerStack = \GuzzleHttp\HandlerStack::create($mock);
        $config       = \HetznerRobotClient\Configuration::Factory('foo', 'bar')
                                                         ->setMockHandler($handlerStack);
        $result       = \HetznerRobotClient\Request\GetStorageBox::Factory($config)
                                                                 ->run(1)
                                                                 ->getResult();
        $this->assertNull($result);
    }
}