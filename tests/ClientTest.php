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


    public function testGetStorageBox()
    {
        $result = \HetznerRobotClient\Client::Factory(
            \HetznerRobotClient\Configuration::Factory('foo', 'bar')
                                             ->setMockHandler(Helper::getMockHandler([
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
                                             ]))
        )
                                            ->getStorageBox(1);
        $this->assertSame('name1', $result->getName());
    }


    public function testUpdateStorageBox()
    {
        $result = \HetznerRobotClient\Client::Factory(
            \HetznerRobotClient\Configuration::Factory('foo', 'bar')
                                             ->setMockHandler(Helper::getMockHandler([
                                                 'storagebox' => [
                                                     'id'            => 1,
                                                     'login'         => 'login1',
                                                     'name'          => 'foo',
                                                     'product'       => 'storagebox',
                                                     'cancelled'     => false,
                                                     'locked'        => false,
                                                     'location'      => 'narnia',
                                                     'linked_server' => 1234,
                                                     'paid_until'    => '2020-01-02 12:34:56',
                                                 ],
                                             ]))
        )
                                            ->updateStorageBox(
                                                (new \HetznerRobotClient\Request\UpdateStorageBox\Parameters())
                                                    ->setId(1)
                                                    ->setNewName('foo')
                                            );
        $this->assertSame('foo', $result->getName());
    }


    public function testUpdateStorageBoxFails()
    {
        $result = \HetznerRobotClient\Client::Factory(
            \HetznerRobotClient\Configuration::Factory('foo', 'bar')
                                             ->setMockHandler(Helper::getMockHandler([], 401))
        )
                                            ->updateStorageBox(
                                                (new \HetznerRobotClient\Request\UpdateStorageBox\Parameters())
                                                    ->setId(1)
                                                    ->setNewName('foo')
                                            );
        $this->assertNull($result);
    }


    public function testStorageBoxSubAccountListing()
    {
        $data    = [
            [
                'subaccount' => [
                ],
            ],
            'subaccount' => [
            ],
        ];
        $data    = [];
        $data[0] = [
            'subaccount' => [
                'username'              => 'sub1',
                'accountid'             => '1',
                'server'                => '1.foo.bar',
                'homedirectory'         => 'foo/bar',
                'samba'                 => true,
                'ssh'                   => true,
                'webdav'                => true,
                'external_reachability' => false,
                'readonly'              => false,
                'createtime'            => '2020-01-02 12:34:56',
                'comment'               => null,
            ],
        ];
        $data[1] = [
            'subaccount' => [
                'username'              => 'sub2',
                'accountid'             => '1',
                'server'                => '2.foo.bar',
                'homedirectory'         => 'foo/bar',
                'samba'                 => true,
                'ssh'                   => true,
                'webdav'                => true,
                'external_reachability' => false,
                'readonly'              => true,
                'createtime'            => '2020-02-03 12:34:56',
                'comment'               => 'bla fooo',
            ],
        ];
        $result  = \HetznerRobotClient\Client::Factory(
            \HetznerRobotClient\Configuration::Factory('foo', 'bar')
                /**
                 * [{"subaccount":{"username":"u292232-sub1","accountid":"292232","server":"u292232-sub1.your-storagebox.de","homedirectory":"k2m\/mandators\/4","samba":false,"ssh":false,"external_reachability":true,"webdav":false,"readonly":false,"createtime":"2022-02-25 13:21:15","comment":null}},{"subaccount":{"username":"u292232-sub2","accountid":"292232","server":"u292232-sub2.your-storagebox.de","homedirectory":"k2m\/mandators\/5","samba":false,"ssh":true,"external_reachability":true,"webdav":false,"readonly":false,"createtime":"2022-02-25 16:49:12","comment":""}},{"subaccount":{"username":"u292232-sub3","accountid":"292232","server":"u292232-sub3.your-storagebox.de","homedirectory":"backups","samba":false,"ssh":true,"external_reachability":true,"webdav":true,"readonly":true,"createtime":"2022-03-11 20:02:42","comment":"foooobaaaazzzz"}},{"subaccount":{"username":"u292232-sub4","accountid":"292232","server":"u292232-sub4.your-storagebox.de","homedirectory":"backups","samba":false,"ssh":true,"external_reachability":true,"webdav":true,"readonly":true,"createtime":"2022-03-11 20:05:07","comment":"foooobaaaazzzz"}},{"subaccount":{"username":"u292232-sub5","accountid":"292232","server":"u292232-sub5.your-storagebox.de","homedirectory":"backups","samba":false,"ssh":true,"external_reachability":true,"webdav":true,"readonly":true,"createtime":"2022-03-11 20:06:14","comment":"foooobaaaazzzz"}}]
                 */
                                             ->setMockHandler(Helper::getMockHandler(
                    $data))
        )
                                             ->getStorageBoxSubAccounts(
                                                 (new \HetznerRobotClient\Dto\StorageBox())
                                                     ->setId(1)
                                             );
        $this->assertSame(2, $result->count());
        $this->assertSame('sub1', $result->getByUserName('sub1')->getUserName());
    }

    public function testStorageBoxSubAccountCreation()
    {
        $data          = [];
        $homeDirectory = 'foo/home/bar';
        $result        = \HetznerRobotClient\Client::Factory(
            \HetznerRobotClient\Configuration::Factory('foo', 'bar')
                                             ->setMockHandler(Helper::getMockHandler(
                                                 $data))
        )
                                                   ->createStorageBoxSubAccount(
                                                       \HetznerRobotClient\Request\StorageBox\SubAccount\Create\Parameters::Factory()
                                                                                                                          ->setStorageBox(
                                                                                                                              (new \HetznerRobotClient\Dto\StorageBox())
                                                                                                                                  ->setId(1)
                                                                                                                          )
                                                                                                                          ->setHomeDirectory($homeDirectory)
                                                                                                                          ->setReadonly(false)
                                                                                                                          ->setComment('bummi')
                                                                                                                          ->setWebdav(false)
                                                                                                                          ->setExternalReachability(true)
                                                                                                                          ->setSsh(true)
                                                                                                                          ->setSamba(false)
                                                   )
        ;
        $this->assertSame($homeDirectory, $result->getHomedirectory());
    }
}
