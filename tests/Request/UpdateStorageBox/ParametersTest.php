<?php

namespace HetznerRobotClientTest\Request\UpdateStorageBox;

class ParametersTest extends \PHPUnit\Framework\TestCase
{
    public function testValidationFailsOnMissingId()
    {
        $this->expectExceptionMessage('missing id');
        (new \HetznerRobotClient\Request\UpdateStorageBox\Parameters())
            ->validate()
        ;
    }


    public function testValidationNotFailing()
    {
        (new \HetznerRobotClient\Request\UpdateStorageBox\Parameters())
            ->setId(1234)
            ->validate()
        ;
        $this->assertSame(true, true);
    }


    public function testGetSetId()
    {
        $parameters = new \HetznerRobotClient\Request\UpdateStorageBox\Parameters();
        $id         = 1234;
        $this->assertSame($id, $parameters->setId($id)->getId());
    }


    public function testGetSetName()
    {
        $parameters = new \HetznerRobotClient\Request\UpdateStorageBox\Parameters();
        $this->assertNull($parameters->getNewName());
        $newName = 'newName';
        $this->assertSame($newName, $parameters->setNewName($newName)->getNewName());
    }


    public function testGetSetSamba()
    {
        $parameters = new \HetznerRobotClient\Request\UpdateStorageBox\Parameters();
        $this->assertNull($parameters->getSamba());
        $samba = true;
        $this->assertSame($samba, $parameters->setSamba($samba)->getSamba());
        $samba = false;
        $this->assertSame($samba, $parameters->setSamba($samba)->getSamba());
    }


    public function testGetSetWebdav()
    {
        $parameters = new \HetznerRobotClient\Request\UpdateStorageBox\Parameters();
        $this->assertNull($parameters->getWebdav());
        $webdav = true;
        $this->assertSame($webdav, $parameters->setWebdav($webdav)->getWebdav());
        $webdav = false;
        $this->assertSame($webdav, $parameters->setWebdav($webdav)->getWebdav());
    }


    public function testGetSetSsh()
    {
        $parameters = new \HetznerRobotClient\Request\UpdateStorageBox\Parameters();
        $this->assertNull($parameters->getSsh());
        $ssh = true;
        $this->assertSame($ssh, $parameters->setSsh($ssh)->getSsh());
        $ssh = false;
        $this->assertSame($ssh, $parameters->setSsh($ssh)->getSsh());
    }


    public function testGetSetExternalReachability()
    {
        $parameters = new \HetznerRobotClient\Request\UpdateStorageBox\Parameters();
        $this->assertNull($parameters->getExternalReachability());
        $externalReachability = true;
        $this->assertSame($externalReachability, $parameters->setExternalReachability($externalReachability)->getExternalReachability());
        $externalReachability = false;
        $this->assertSame($externalReachability, $parameters->setExternalReachability($externalReachability)->getExternalReachability());
    }


    public function testGetSetZfs()
    {
        $parameters = new \HetznerRobotClient\Request\UpdateStorageBox\Parameters();
        $this->assertNull($parameters->getZfs());
        $zfs = true;
        $this->assertSame($zfs, $parameters->setZfs($zfs)->getZfs());
        $zfs = false;
        $this->assertSame($zfs, $parameters->setZfs($zfs)->getZfs());
    }


    /**
     * @dataProvider dataTestGetDataProvider
     */
    public function testGetData($parameters, $expected)
    {
        $this->assertSame($expected, $parameters->getData());
    }


    public function dataTestGetDataProvider()
    {
        return [
            [
                (new \HetznerRobotClient\Request\UpdateStorageBox\Parameters())
                    ->setId(1234),
                [],
            ],
            [
                (new \HetznerRobotClient\Request\UpdateStorageBox\Parameters())
                    ->setId(1234)
                    ->setNewName('foo')
                ,
                ['storagebox_name' => 'foo'],
            ],
            [
                (new \HetznerRobotClient\Request\UpdateStorageBox\Parameters())
                    ->setId(1234)
                    ->setNewName('foo')
                    ->setWebdav(true)
                    ->setExternalReachability(true)
                    ->setSsh(true)
                    ->setZfs(true)
                    ->setSamba(true)
                ,
                [
                    'storagebox_name'       => 'foo',
                    'samba'                 => true,
                    'webdav'                => true,
                    'ssh'                   => true,
                    'external_reachability' => true,
                    'zfs'                   => true,
                ],
            ],
            [
                (new \HetznerRobotClient\Request\UpdateStorageBox\Parameters())
                    ->setId(1234)
                    ->setNewName('foo')
                    ->setWebdav(false)
                    ->setExternalReachability(false)
                    ->setSsh(false)
                    ->setZfs(false)
                    ->setSamba(false)
                ,
                [
                    'storagebox_name'       => 'foo',
                    'samba'                 => false,
                    'webdav'                => false,
                    'ssh'                   => false,
                    'external_reachability' => false,
                    'zfs'                   => false,
                ],
            ],
        ];
    }
}