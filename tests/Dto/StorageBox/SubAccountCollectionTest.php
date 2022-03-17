<?php

namespace HetznerRobotClientTest\Dto\StorageBox;

class SubAccountCollectionTest extends \PHPUnit\Framework\TestCase
{
    protected function getCollection(): \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
    {
        return new \HetznerRobotClient\Dto\StorageBox\SubAccountCollection();
    }


    protected function getSubAccount1(): \HetznerRobotClient\Dto\StorageBox\SubAccount
    {
        return (new \HetznerRobotClient\Dto\StorageBox\SubAccount())
            ->setHomeDirectory('#1')
            ->setUserName('sub1')
        ;
    }
    protected function getSubAccount2(): \HetznerRobotClient\Dto\StorageBox\SubAccount
    {
        return (new \HetznerRobotClient\Dto\StorageBox\SubAccount())
            ->setHomeDirectory('#2')
            ->setUserName('sub2')
        ;
    }
    protected function getSubAccount3(): \HetznerRobotClient\Dto\StorageBox\SubAccount
    {
        return (new \HetznerRobotClient\Dto\StorageBox\SubAccount())
            ->setHomeDirectory('#3')
            ->setUserName('sub3')
        ;
    }


    

    public function testDefaultIsEmpty()
    {
        $this->assertSame(0, $this->getCollection()->count());
    }


    public function testAdding()
    {
        $collection = $this->getCollection();
        $this->assertFalse($collection->hasItems());
        $subAccount1 = $this->getSubAccount1();
        $subAccount2 = $this->getSubAccount2();
        $subAccount3 = $this->getSubAccount3();
        $collection->addItem($subAccount1);
        $this->assertSame(1, $collection->count());
        $collection->addItem($subAccount2);
        $this->assertSame(2, $collection->count());
        $collection->addItem($subAccount3);
        $this->assertSame(3, $collection->count());
        $collection->addItem($subAccount3);
        $this->assertSame(3, $collection->count());
        $collection->addItem($subAccount3);
        $this->assertSame(3, $collection->count());
        $this->assertTrue($collection->hasItems());
    }
    

    public function testGetByUserName()
    {
        $subAccount       = $this->getSubAccount1();
        $collection = $this
            ->getCollection()
            ->addItem($subAccount);
        $this->assertSame($subAccount->getUserName(), $collection->getByUserName($subAccount->getUserName())->getUserName());
        $this->assertNull($collection->getByUserName('sub-1'));
    }


    public function testRemoving()
    {
        $subAccount       = $this->getSubAccount1();
        $collection = $this
            ->getCollection()
            ->addItem($subAccount);
        $this->assertSame($subAccount->getUserName(), $collection->getByUserName($subAccount->getUserName())->getUserName());
        $this->assertNotNull($collection->getByUserName($subAccount->getUserName()));
        $collection->removeItem($subAccount);
        $this->assertNull($collection->getByUserName($subAccount->getUserName()));
    }


    public function testAddItems()
    {
        $boxes      = [
            $this->getSubAccount1(),
            $this->getSubAccount3(),
            $this->getSubAccount2(),
            $this->getSubAccount1(),
            $this->getSubAccount2(),
            $this->getSubAccount3(),
            $this->getSubAccount3(),
            $this->getSubAccount1(),
            $this->getSubAccount2(),
        ];
        $collection = $this->getCollection()->addItems($boxes);
        $this->assertSame(3, $collection->count());
    }


    /**
     * @depends testAddItems
     */
    public function testClearItems()
    {
        $subAccount1       = $this->getSubAccount1();
        $subAccount2       = $this->getSubAccount2();
        $collection = $this
            ->getCollection()
            ->addItem($subAccount1)
            ->addItem($subAccount2);
        $this->assertSame(2, $collection->count());
        $this->assertSame(0, $collection->clearItems()->count());
    }


    /**
     * @depends testClearItems
     */
    public function testSetItems()
    {
        $subAccount1       = $this->getSubAccount1();
        $subAccount2       = $this->getSubAccount2();
        $subAccount3       = $this->getSubAccount3();
        $collection = $this
            ->getCollection()
            ->addItem($subAccount1)
            ->addItem($subAccount2);
        $this->assertSame(2, $collection->count());
        $this->assertSame(0, $collection->clearItems()->count());
        $this->assertSame(3, $collection->setItems([$subAccount1, $subAccount2, $subAccount3])->count());
    }


    public function testForeach()
    {
        $subAccount1       = $this->getSubAccount1();
        $subAccount2       = $this->getSubAccount2();
        $subAccount3       = $this->getSubAccount3();
        $collection = $this
            ->getCollection()
            ->addItems([
                $subAccount1,
                $subAccount2,
                $subAccount3,
            ]);
        foreach ($collection->getItems() as $item) {
            $this->assertTrue(\in_array($item->getUserName(), [$subAccount1->getUserName(), $subAccount2->getUserName(), $subAccount3->getUserName()]));
        }
    }
}