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
    private $id;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $product;

    /**
     * @var bool
     */
    private $cancelled;

    /**
     * @var bool
     */
    private $locked;

    /**
     * @var string
     */
    private $location;

    /**
     * @var int | null
     */
    private $linked_server;

    /**
     * @var \DateTime
     */
    private $paid_until;


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
        return $this->linked_server;
    }


    /**
     * @param int|null $linked_server
     *
     * @return StorageBox
     */
    public function setLinkedServer(?int $linked_server): StorageBox
    {
        $this->linked_server = $linked_server;

        return $this;
    }

    


    /**
     * @return \DateTime
     */
    public function getPaidUntil(): \DateTime
    {
        return $this->paid_until;
    }


    /**
     * @param \DateTime $paid_until
     *
     * @return StorageBox
     */
    public function setPaidUntil(\DateTime $paid_until): StorageBox
    {
        $this->paid_until = $paid_until;

        return $this;
    }
}
