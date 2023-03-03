<?php

namespace HetznerRobotClient\Request\StorageBox\SubAccount\Create;

/**
 * Class Parameters
 *
 * @package HetznerRobotClient\Request\StorageBox\SubAccount\Create
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
    protected $homeDirectory;

    /**
     * @var bool
     */
    protected $samba = false;

    /**
     * @var bool
     */
    protected $ssh = false;

    /**
     * @var bool
     */
    protected $externalReachability = false;

    /**
     * @var bool
     */
    protected $webdav = false;

    /**
     * @var bool
     */
    protected $readonly = false;

    /**
     * @var string|null
     */
    protected $comment;


    /**
     * disallow direct construction
     */
    private function __construct()
    {
    }


    /**
     * @return \HetznerRobotClient\Request\StorageBox\SubAccount\Create\Parameters
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
        if (null === $this->getHomeDirectory()) {
            throw new \InvalidArgumentException('missing home directory!');
        }

        return $this;
    }


    /**
     * @return array
     */
    public function getData(): array
    {
        $this->validate();

        return [
            'homedirectory'         => $this->getHomeDirectory(),
            'samba'                 => $this->isSamba(),
            'webdav'                => $this->isWebdav(),
            'ssh'                   => $this->isSsh(),
            'external_reachability' => $this->isExternalReachability(),
            'readonly'              => $this->isReadonly(),
            'comment'               => $this->getComment(),
        ];
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
    public function getHomeDirectory(): string
    {
        return $this->homeDirectory;
    }


    /**
     * @param string $homeDirectory
     *
     * @return Parameters
     */
    public function setHomeDirectory(string $homeDirectory): Parameters
    {
        $this->homeDirectory = $homeDirectory;

        return $this;
    }


    /**
     * @return bool
     */
    public function isSamba(): bool
    {
        return $this->samba;
    }


    /**
     * @param bool $samba
     *
     * @return Parameters
     */
    public function setSamba(bool $samba): Parameters
    {
        $this->samba = $samba;

        return $this;
    }


    /**
     * @return bool
     */
    public function isSsh(): bool
    {
        return $this->ssh;
    }


    /**
     * @param bool $ssh
     *
     * @return Parameters
     */
    public function setSsh(bool $ssh): Parameters
    {
        $this->ssh = $ssh;

        return $this;
    }


    /**
     * @return bool
     */
    public function isExternalReachability(): bool
    {
        return $this->externalReachability;
    }


    /**
     * @param bool $externalReachability
     *
     * @return Parameters
     */
    public function setExternalReachability(bool $externalReachability): Parameters
    {
        $this->externalReachability = $externalReachability;

        return $this;
    }


    /**
     * @return bool
     */
    public function isWebdav(): bool
    {
        return $this->webdav;
    }


    /**
     * @param bool $webdav
     *
     * @return Parameters
     */
    public function setWebdav(bool $webdav): Parameters
    {
        $this->webdav = $webdav;

        return $this;
    }


    /**
     * @return bool
     */
    public function isReadonly(): bool
    {
        return $this->readonly;
    }


    /**
     * @param bool $readonly
     *
     * @return Parameters
     */
    public function setReadonly(bool $readonly): Parameters
    {
        $this->readonly = $readonly;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }


    /**
     * @param string|null $comment
     *
     * @return Parameters
     */
    public function setComment(?string $comment): Parameters
    {
        $this->comment = $comment;

        return $this;
    }
}
