<?php

namespace HetznerRobotClientTest\Dto\StorageBox;

class SubAccountTest extends \PHPUnit\Framework\TestCase
{
    protected function getInstance(): \HetznerRobotClient\Dto\StorageBox\SubAccount
    {
        return new \HetznerRobotClient\Dto\StorageBox\SubAccount();
    }


    public function testGetSetUserName()
    {
        $userName = 'userName';
        $this->assertSame($userName, $this->getInstance()->setUserName($userName)->getUserName());
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


    public function testGetSetWebdav()
    {
        $webdav = false;
        $this->assertSame($webdav, $this->getInstance()->setWebdav($webdav)->isWebdav());
        $webdav = true;
        $this->assertSame($webdav, $this->getInstance()->setWebdav($webdav)->isWebdav());
    }


    public function testGetSetSamba()
    {
        $samba = false;
        $this->assertSame($samba, $this->getInstance()->setSamba($samba)->isSamba());
        $samba = true;
        $this->assertSame($samba, $this->getInstance()->setSamba($samba)->isSamba());
    }


    public function testGetSetSsh()
    {
        $ssh = false;
        $this->assertSame($ssh, $this->getInstance()->setSsh($ssh)->isSsh());
        $ssh = true;
        $this->assertSame($ssh, $this->getInstance()->setSsh($ssh)->isSsh());
    }


    public function testGetSetExternalReachable()
    {
        $externalReachable = false;
        $this->assertSame($externalReachable, $this->getInstance()->setExternalReachability($externalReachable)->isExternalReachability());
        $externalReachable = true;
        $this->assertSame($externalReachable, $this->getInstance()->setExternalReachability($externalReachable)->isExternalReachability());
    }


    public function testGetSetReadonly()
    {
        $readOnly = false;
        $this->assertSame($readOnly, $this->getInstance()->setReadonly($readOnly)->isReadonly());
        $readOnly = true;
        $this->assertSame($readOnly, $this->getInstance()->setReadonly($readOnly)->isReadonly());
    }


    public function testGetSetCreateTime()
    {
        $createTime = new \DateTime('2020-01-23 12:34:56');
        $this->assertSame($createTime, $this->getInstance()->setCreateTime($createTime)->getCreateTime());
    }


    public function testGetSetComment()
    {
        $comment = 'comment';
        $this->assertNull($this->getInstance()->getComment());
        $this->assertSame($comment, $this->getInstance()->setComment($comment)->getComment());
    }
}
