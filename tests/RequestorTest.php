<?php

namespace HetznerRobotClientTest;

class RequestorTest extends \PHPUnit\Framework\TestCase
{
    public function testGetCLient()
    {
        $requestorWithMock = \HetznerRobotClient\Requestor::Factory(
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
        );
        $requestorNoMock = \HetznerRobotClient\Requestor::Factory(
            \HetznerRobotClient\Configuration::Factory('foo', 'bar')
        );
        $this->assertSame(\get_class($requestorNoMock->getClient()), \get_class($requestorWithMock->getClient()));
    }


    public function testGetOptions()
    {
        $configuration = \HetznerRobotClient\Configuration::Factory('foo', 'bar')
                                                          ->setDebugRequests(true)
                                                          ->setHost('foo');
        $requestor = \HetznerRobotClient\Requestor::Factory($configuration);
        $expected  = [
            'debug' => true,
            'auth'  => [
                'foo',
                'bar',
            ],
        ];
        $this->assertSame($expected, $requestor->getOptions());
    }
}