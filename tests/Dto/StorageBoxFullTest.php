<?php

namespace HetznerRobotClientTest\Dto;

class StorageBoxFullTest extends \PHPUnit\Framework\TestCase
{
    protected function getInstance(): \HetznerRobotClient\Dto\StorageBoxFull
    {
        return new \HetznerRobotClient\Dto\StorageBoxFull();
    }


    public function testGetSetDiskQuota()
    {
        $diskQuota = 1234;
        $this->assertSame($diskQuota, $this->getInstance()->setDiskQuota($diskQuota)->getDiskQuota());
    }


    public function testGetSetDiskUsage()
    {
        $diskUsage = 1234;
        $this->assertSame($diskUsage, $this->getInstance()->setDiskUsage($diskUsage)->getDiskUsage());
    }


    public function testGetSetDiskUsageData()
    {
        $diskUsageData = 1234;
        $this->assertSame($diskUsageData, $this->getInstance()->setDiskUsageData($diskUsageData)->getDiskUsageData());
    }


    public function testGetSetDiskUsageSnapshots()
    {
        $diskUsageSnapshots = 1234;
        $this->assertSame($diskUsageSnapshots, $this->getInstance()->setDiskUsageSnapshots($diskUsageSnapshots)->getDiskUsageSnapshots());
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


    public function testGetSetZfs()
    {
        $zfs = false;
        $this->assertSame($zfs, $this->getInstance()->setZfs($zfs)->isZfs());
        $zfs = true;
        $this->assertSame($zfs, $this->getInstance()->setZfs($zfs)->isZfs());
    }


    public function testGetSetServer()
    {
        $server = 'server';
        $this->assertSame($server, $this->getInstance()->setServer($server)->getServer());
    }


    public function testGetSetHostSystem()
    {
        $hostSystem = 'hostSystem';
        $this->assertSame($hostSystem, $this->getInstance()->setHostSystem($hostSystem)->getHostSystem());
    }
}