<?php

namespace HetznerRobotClientTest\Dto;

class StorageBoxTest extends \PHPUnit\Framework\TestCase
{
    protected function getInstance(): \HetznerRobotClient\Dto\StorageBox
    {
        return new \HetznerRobotClient\Dto\StorageBox();
    }


    public function testGetSetId()
    {
        $id = 1234;
        $this->assertSame($id, $this->getInstance()->setId($id)->getId());
    }


    public function testGetSetLogin()
    {
        $login = 'login';
        $this->assertSame($login, $this->getInstance()->setLogin($login)->getLogin());
    }


    public function testGetSetProduct()
    {
        $product = 'product';
        $this->assertSame($product, $this->getInstance()->setProduct($product)->getProduct());
    }


    public function testGetSetCancelled()
    {
        $this->assertSame(true, $this->getInstance()->setCancelled(true)->isCancelled());
        $this->assertSame(false, $this->getInstance()->setCancelled(false)->isCancelled());
    }


    public function testGetSetLocked()
    {
        $this->assertSame(true, $this->getInstance()->setLocked(true)->isLocked());
        $this->assertSame(false, $this->getInstance()->setLocked(false)->isLocked());
    }


    public function testGetSetLocation()
    {
        $location = 'location';
        $this->assertSame($location, $this->getInstance()->setLocation($location)->getLocation());
    }


    public function testGetSetLinkedServer()
    {
        $linkedServer = null;
        $this->assertSame($linkedServer, $this->getInstance()->setLinkedServer($linkedServer)->getLinkedServer());
        $linkedServer = 123;
        $this->assertSame($linkedServer, $this->getInstance()->setLinkedServer($linkedServer)->getLinkedServer());
    }


    public function testGetSetPaidUntil()
    {
        $paidUntil = new \DateTime('2020-01-23 12:34:56');
        $this->assertSame($paidUntil, $this->getInstance()->setPaidUntil($paidUntil)->getPaidUntil());
    }
}