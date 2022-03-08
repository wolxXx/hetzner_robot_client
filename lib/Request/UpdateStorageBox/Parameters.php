<?php

namespace HetznerRobotClient\Request\UpdateStorageBox;

/**
 * Class Parameters
 *
 * @package HetznerRobotClient\Request\UpdateStorageBox
 */
class Parameters
{
    /**
     * @var int | null
     */
    private $id;

    /**
     * @var string | null
     */
    private $newName;

    /**
     * @var bool | null
     */
    private $samba;

    /**
     * @var bool | null
     */
    private $webdav;

    /**
     * @var bool | null
     */
    private $ssh;

    /**
     * @var bool | null
     */
    private $externalReachability;

    /**
     * @var bool | null
     */
    private $zfs;


    /**
     * @return $this
     */
    public function validate(): Parameters
    {
        if (null === $this->getId()) {
            throw new \InvalidArgumentException('missing id');
        }

        return $this;
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @param int|null $id
     *
     * @return Parameters
     */
    public function setId(?int $id): Parameters
    {
        $this->id = $id;

        return $this;
    }

    
    /**
     * @return string|null
     */
    public function getNewName(): ?string
    {
        return $this->newName;
    }


    /**
     * @param string|null $newName
     *
     * @return Parameters
     */
    public function setNewName(?string $newName): Parameters
    {
        $this->newName = $newName;

        return $this;
    }


    /**
     * @return bool|null
     */
    public function getSamba(): ?bool
    {
        return $this->samba;
    }


    /**
     * @param bool|null $samba
     *
     * @return Parameters
     */
    public function setSamba(?bool $samba): Parameters
    {
        $this->samba = $samba;

        return $this;
    }


    /**
     * @return bool|null
     */
    public function getWebdav(): ?bool
    {
        return $this->webdav;
    }


    /**
     * @param bool|null $webdav
     *
     * @return Parameters
     */
    public function setWebdav(?bool $webdav): Parameters
    {
        $this->webdav = $webdav;

        return $this;
    }


    /**
     * @return bool|null
     */
    public function getSsh(): ?bool
    {
        return $this->ssh;
    }


    /**
     * @param bool|null $ssh
     *
     * @return Parameters
     */
    public function setSsh(?bool $ssh): Parameters
    {
        $this->ssh = $ssh;

        return $this;
    }


    /**
     * @return bool|null
     */
    public function getExternalReachability(): ?bool
    {
        return $this->externalReachability;
    }


    /**
     * @param bool|null $externalReachability
     *
     * @return Parameters
     */
    public function setExternalReachability(?bool $externalReachability): Parameters
    {
        $this->externalReachability = $externalReachability;

        return $this;
    }


    /**
     * @return bool|null
     */
    public function getZfs(): ?bool
    {
        return $this->zfs;
    }


    /**
     * @param bool|null $zfs
     *
     * @return Parameters
     */
    public function setZfs(?bool $zfs): Parameters
    {
        $this->zfs = $zfs;

        return $this;
    }
}
