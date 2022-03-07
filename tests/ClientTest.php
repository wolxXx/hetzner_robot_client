<?php

namespace HetznerRobotClientTest;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf(\HetznerRobotClient\Client::class, \HetznerRobotClient\Client::Factory(\HetznerRobotClient\Configuration::Factory('foo', 'bar')));
    }


    public function testGetStorageBoxCollection()
    {
        $result = \HetznerRobotClient\Client::Factory(
            \HetznerRobotClient\Configuration::Factory('foo', 'bar')
                                             ->setMockHandler(Helper::getMockHandler([
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
                                             ]))
        )
                                            ->getAllStorageBoxes();
        $this->assertSame('name1', $result->getById(1)->getName());
    }
}