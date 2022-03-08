<?php

namespace HetznerRobotClient\Dto;

/**
 * Class StorageBox
 *
 * @package HetznerRobotClient\Dto
 */
class StorageBox
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $product;

    /**
     * @var bool
     */
    protected $cancelled;

    /**
     * @var bool
     */
    protected $locked;

    /**
     * @var string
     */
    protected $location;

    /**
     * @var int | null
     */
    protected $linkedServer;

    /**
     * @var \DateTime
     */
    protected $paidUntil;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param int $id
     *
     * @return StorageBox
     */
    public function setId(int $id): StorageBox
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }


    /**
     * @param string $login
     *
     * @return StorageBox
     */
    public function setLogin(string $login): StorageBox
    {
        $this->login = $login;

        return $this;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     *
     * @return StorageBox
     */
    public function setName(string $name): StorageBox
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }


    /**
     * @param string $product
     *
     * @return StorageBox
     */
    public function setProduct(string $product): StorageBox
    {
        $this->product = $product;

        return $this;
    }


    /**
     * @return bool
     */
    public function isCancelled(): bool
    {
        return $this->cancelled;
    }


    /**
     * @param bool $cancelled
     *
     * @return StorageBox
     */
    public function setCancelled(bool $cancelled): StorageBox
    {
        $this->cancelled = $cancelled;

        return $this;
    }


    /**
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->locked;
    }


    /**
     * @param bool $locked
     *
     * @return StorageBox
     */
    public function setLocked(bool $locked): StorageBox
    {
        $this->locked = $locked;

        return $this;
    }


    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }


    /**
     * @param string $location
     *
     * @return StorageBox
     */
    public function setLocation(string $location): StorageBox
    {
        $this->location = $location;

        return $this;
    }


    /**
     * @return int|null
     */
    public function getLinkedServer(): ?int
    {
        return $this->linkedServer;
    }


    /**
     * @param int|null $linkedServer
     *
     * @return StorageBox
     */
    public function setLinkedServer(?int $linkedServer): StorageBox
    {
        $this->linkedServer = $linkedServer;

        return $this;
    }

    


    /**
     * @return \DateTime
     */
    public function getPaidUntil(): \DateTime
    {
        return $this->paidUntil;
    }


    /**
     * @param \DateTime $paidUntil
     *
     * @return StorageBox
     */
    public function setPaidUntil(\DateTime $paidUntil): StorageBox
    {
        $this->paidUntil = $paidUntil;

        return $this;
    }
}
