<?php

namespace HetznerRobotClient\Dto;

/**
 * Class StorageBoxCollection
 *
 * @package HetznerRobotClient\Dto
 */
class StorageBoxCollection
{
    /**
     * @var \HetznerRobotClient\Dto\StorageBox[]
     */
    private $items;


    /**
     * constructor
     */
    public final function __construct()
    {
        $this->items = [];
    }


    /**
     * @param int $id
     *
     * @return \HetznerRobotClient\Dto\StorageBox | null
     */
    public function getById(int $id): ?StorageBox
    {
        foreach ($this->getItems() as $item) {
            if ($item->getId() === $id) {
                return $item;
            }
        }

        return null;
    }


    /**
     * @param string $name
     *
     * @return \HetznerRobotClient\Dto\StorageBox|null
     */
    public function getByName(string $name): ?StorageBox
    {
        foreach ($this->getItems() as $item) {
            if ($item->getName() === $name) {
                return $item;
            }
        }

        return null;
    }


    /**
     * @param \HetznerRobotClient\Dto\StorageBox $box
     *
     * @return StorageBoxCollection
     */
    public function removeItem(StorageBox $box): StorageBoxCollection
    {
        unset($this->items[$box->getId()]);

        return $this;
    }


    /**
     * @param \HetznerRobotClient\Dto\StorageBox $box
     *
     * @return StorageBoxCollection
     */
    public function addItem(StorageBox $box): StorageBoxCollection
    {
        $this->items[$box->getId()] = $box;

        return $this;
    }


    /**
     * @param \HetznerRobotClient\Dto\StorageBox[] $boxes
     *
     * @return StorageBoxCollection
     */
    public function addItems(array $boxes): StorageBoxCollection
    {
        foreach ($boxes as $box) {
            $this->addItem($box);
        }

        return $this;
    }


    /**
     * @param \HetznerRobotClient\Dto\StorageBox[] $boxes
     *
     * @return StorageBoxCollection
     */
    public function setItems(array $boxes = []): StorageBoxCollection
    {
        return $this
            ->clearItems()
            ->addItems($boxes)
        ;
    }


    /**
     * @return StorageBoxCollection
     */
    public function clearItems(): StorageBoxCollection
    {
        $this->items = [];

        return $this;
    }


    /**
     * @return \HetznerRobotClient\Dto\StorageBox[]
     */
    public function getItems(): array
    {
        return $this->items;
    }


    /**
     * @return int
     */
    public function count(): int
    {
        return \sizeof($this->getItems());
    }


    /**
     * @return bool
     */
    public function hasItems(): bool
    {
        return 0 !== $this->count();
    }
}
