<?php

namespace HetznerRobotClientTest;

class ConfigurationTest extends \PHPUnit\Framework\TestCase
{
    protected function getConfiguration()
    {
        return \HetznerRobotClient\Configuration::Factory('foo', 'bar');
    }


    public function testFactory()
    {
        $configuration = $this->getConfiguration();
        $this->assertSame('foo', $configuration->getUsername());
        $this->assertSame('bar', $configuration->getPassword());
        $this->assertSame('https://robot-ws.your-server.de', $configuration->getHost());
        $this->assertFalse($configuration->shallDebugRequests());
    }


    public function testFactoryWithHost()
    {
        $configuration = \HetznerRobotClient\Configuration::Factory('foo', 'bar', 'hostTest');
        $this->assertSame('hostTest', $configuration->getHost());
    }


    public function testConstructorIsDisabledFromOuterSpace()
    {
        $this->expectExceptionMessage("Call to private HetznerRobotClient\Configuration::__construct() from context 'HetznerRobotClientTest\ConfigurationTest'");
        /**
         * @SuppressWarnings('all')
         */
        new \HetznerRobotClient\Configuration();
    }


    public function testGetSetUsername()
    {
        $username = 'username';
        $this->assertSame($username, $this->getConfiguration()->setUsername($username)->getUsername());
    }


    public function testGetSetPassword()
    {
        $password = 'password';
        $this->assertSame($password, $this->getConfiguration()->setPassword($password)->getPassword());
    }


    public function testGetSetHost()
    {
        $host = 'host';
        $this->assertSame($host, $this->getConfiguration()->setHost($host)->getHost());
    }


    public function testGetSetMockHandler()
    {
        $host          = \GuzzleHttp\Handler\MockHandler::createWithMiddleware();
        $configuration = $this->getConfiguration();
        $this->assertNull($configuration->getMockHandler());
        $this->assertSame($host, $configuration->setMockHandler($host)->getMockHandler());
    }


    public function testGetSetDebugRequests()
    {
        $doDebug = false;
        $this->assertSame($doDebug, $this->getConfiguration()->setDebugRequests($doDebug)->shallDebugRequests());
        $doDebug = true;
        $this->assertSame($doDebug, $this->getConfiguration()->setDebugRequests($doDebug)->shallDebugRequests());
    }
}