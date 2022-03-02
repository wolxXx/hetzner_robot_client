<?php

namespace HetznerRobotClientTest\Dto;

class StorageBoxCollectionTest extends \PHPUnit\Framework\TestCase
{
    protected function getCollection(): \HetznerRobotClient\Dto\StorageBoxCollection
    {
        return new \HetznerRobotClient\Dto\StorageBoxCollection();
    }


    protected function getBox1(): \HetznerRobotClient\Dto\StorageBox
    {
        return (new \HetznerRobotClient\Dto\StorageBox())
            ->setId(1)
            ->setName('box 1')
        ;
    }


    protected function getBox2(): \HetznerRobotClient\Dto\StorageBox
    {
        return (new \HetznerRobotClient\Dto\StorageBox())
            ->setId(2)
            ->setName('box 2')
        ;
    }


    protected function getBox3(): \HetznerRobotClient\Dto\StorageBox
    {
        return (new \HetznerRobotClient\Dto\StorageBox())
            ->setId(3)
            ->setName('box 3')
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
        $box1       = $this->getBox1();
        $box2       = $this->getBox2();
        $box3       = $this->getBox3();
        $collection->addItem($box1);
        $this->assertSame(1, $collection->count());
        $collection->addItem($box2);
        $this->assertSame(2, $collection->count());
        $collection->addItem($box3);
        $this->assertSame(3, $collection->count());
        $collection->addItem($box3);
        $this->assertSame(3, $collection->count());
        $collection->addItem($box3);
        $this->assertSame(3, $collection->count());
        $this->assertTrue($collection->hasItems());
    }


    public function testGetById()
    {
        $box3       = $this->getBox3();
        $collection = $this
            ->getCollection()
            ->addItem($box3);
        $this->assertSame($box3->getId(), $collection->getById(3)->getId());
        $this->assertNull($collection->getById(-1));
    }


    public function testGetByName()
    {
        $box3       = $this->getBox3();
        $collection = $this
            ->getCollection()
            ->addItem($box3);
        $this->assertSame($box3->getName(), $collection->getByName($box3->getName())->getName());
        $this->assertNull($collection->getByName('box-1'));
    }


    public function testRemoving()
    {
        $box3 = $this->getBox1();
        $collection = $this
            ->getCollection()
            ->addItem($box3)
        ;
        $this->assertSame($box3->getName(), $collection->getByName($box3->getName())->getName());
        $this->assertNotNull($collection->getByName($box3->getName()));
        $collection->removeItem($box3);
        $this->assertNull($collection->getByName($box3->getName()));
    }


    public function testAddItems()
    {
        $boxes = [
            $this->getBox1(),
            $this->getBox2(),
            $this->getBox3(),
            $this->getBox2(),
            $this->getBox3(),
            $this->getBox1(),
            $this->getBox2(),
            $this->getBox3(),
            $this->getBox2(),
            $this->getBox3(),
        ];
        $collection = $this->getCollection()->addItems($boxes);
        $this->assertSame(3, $collection->count());
    }


    /**
     * @depends testAddItems
     */
    public function testClearItems()
    {
        $box1 = $this->getBox1();
        $box2 = $this->getBox2();
        $collection = $this
            ->getCollection()
            ->addItem($box1)
            ->addItem($box2)
        ;
        $this->assertSame(2, $collection->count());
        $this->assertSame(0, $collection->clearItems()->count());
    }
    /**
     * @depends testClearItems
     */
    public function testSetItems()
    {
        $box1 = $this->getBox1();
        $box2 = $this->getBox2();
        $box3 = $this->getBox3();
        $collection = $this
            ->getCollection()
            ->addItem($box1)
            ->addItem($box2)
        ;
        $this->assertSame(2, $collection->count());
        $this->assertSame(0, $collection->clearItems()->count());
        $this->assertSame(3, $collection->setItems([$box1,$box2,$box3])->count());
        
    }
}