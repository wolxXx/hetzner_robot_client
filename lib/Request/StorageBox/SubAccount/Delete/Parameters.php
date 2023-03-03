<?php

namespace HetznerRobotClient\Request\StorageBox\SubAccount\Delete;

/**
 * Class Parameters
 *
 * @package HetznerRobotClient\Request\StorageBox\SubAccount\Delete
 */
class Parameters
{
    /**
     * @var \HetznerRobotClient\Dto\StorageBox
     */
    protected $storageBox;

    /**
     * @var string
     */
    protected $userName;


    /**
     * disallow direct construction
     */
    private function __construct()
    {
    }


    /**
     * @return \HetznerRobotClient\Request\StorageBox\SubAccount\Delete\Parameters
     */
    public static function Factory(): Parameters
    {
        return new static();
    }


    /**
     * @return $this
     */
    public function validate(): Parameters
    {
        if (null === $this->getStorageBox()) {
            throw new \InvalidArgumentException('missing storage box!');
        }
        if (null === $this->getUserName()) {
            throw new \InvalidArgumentException('missing user name!');
        }

        return $this;
    }


    /**
     * @return \HetznerRobotClient\Dto\StorageBox
     */
    public function getStorageBox(): \HetznerRobotClient\Dto\StorageBox
    {
        return $this->storageBox;
    }


    /**
     * @param \HetznerRobotClient\Dto\StorageBox $storageBox
     *
     * @return Parameters
     */
    public function setStorageBox(\HetznerRobotClient\Dto\StorageBox $storageBox): Parameters
    {
        $this->storageBox = $storageBox;

        return $this;
    }


    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }


    /**
     * @param string $userName
     *
     * @return Parameters
     */
    public function setUserName(string $userName): Parameters
    {
        $this->userName = $userName;

        return $this;
    }
}