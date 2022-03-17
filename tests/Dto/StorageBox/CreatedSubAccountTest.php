<?php

namespace HetznerRobotClientTest\Dto\StorageBox;

class CreatedSubAccountTest extends \PHPUnit\Framework\TestCase
{
    protected function getInstance(): \HetznerRobotClient\Dto\StorageBox\CreatedSubAccount
    {
        return new \HetznerRobotClient\Dto\StorageBox\CreatedSubAccount();
    }


    public function testGetSetUserName()
    {
        $userName = 'userName';
        $this->assertSame($userName, $this->getInstance()->setUserName($userName)->getUserName());
    }


    public function testGetSetPassword()
    {
        $password = 'password';
        $this->assertSame($password, $this->getInstance()->setPassword($password)->getPassword());
    }


    public function testGetSetAccountId()
    {
        $accountId = 'accountId';
        $this->assertSame($accountId, $this->getInstance()->setAccountId($accountId)->getAccountId());
    }


    public function testGetSetServer()
    {
        $server = 'server';
        $this->assertSame($server, $this->getInstance()->setServer($server)->getServer());
    }


    public function testGetSetHomeDirectory()
    {
        $homeDirectory = 'homeDirectory';
        $this->assertSame($homeDirectory, $this->getInstance()->setHomedirectory($homeDirectory)->getHomedirectory());
    }
}