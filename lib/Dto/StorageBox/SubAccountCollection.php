<?php

namespace HetznerRobotClient\Dto\StorageBox;

/**
 * Class SubAccountCollection
 *
 * @package HetznerRobotClient\Dto\StorageBox
 */
class SubAccountCollection
{
    /**
     * @var \HetznerRobotClient\Dto\StorageBox\SubAccount[]
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
     * @param string $userName
     *
     * @return \HetznerRobotClient\Dto\StorageBox\SubAccount|null
     */
    public function getByUserName(string $userName): ?SubAccount
    {
        foreach ($this->getItems() as $item) {
            if ($item->getUserName() === $userName) {
                return $item;
            }
        }

        return null;
    }


    /**
     * @param \HetznerRobotClient\Dto\StorageBox\SubAccount $account
     *
     * @return \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
     */
    public function removeItem(SubAccount $account): SubAccountCollection
    {
        unset($this->items[$account->getUserName()]);

        return $this;
    }


    /**
     * @param \HetznerRobotClient\Dto\StorageBox\SubAccount $account
     *
     * @return \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
     */
    public function addItem(SubAccount $account): SubAccountCollection
    {
        $this->items[$account->getUserName()] = $account;

        return $this;
    }


    /**
     * @param \HetznerRobotClient\Dto\StorageBox\SubAccount[] $accounts
     *
     * @return \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
     */
    public function addItems(array $accounts): SubAccountCollection
    {
        foreach ($accounts as $account) {
            $this->addItem($account);
        }

        return $this;
    }


    /**
     * @param \HetznerRobotClient\Dto\StorageBox\SubAccount[] $accounts
     *
     * @return \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
     */
    public function setItems(array $accounts = []): SubAccountCollection
    {
        return $this
            ->clearItems()
            ->addItems($accounts)
        ;
    }


    /**
     * @return \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
     */
    public function clearItems(): SubAccountCollection
    {
        $this->items = [];

        return $this;
    }


    /**
     * @return \HetznerRobotClient\Dto\StorageBox\SubAccount[]
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
