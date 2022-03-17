<?php

namespace HetznerRobotClient\Dto\StorageBox;

/**
 * Class SubAccount
 *
 * @package HetznerRobotClient\Dto\StorageBox
 */
class SubAccount
{
    /**
     * provided: username
     *
     * @var string
     */
    protected $userName;

    /**
     * provided: accountid
     *
     * @var string
     */
    protected $accountId;

    /**
     * @var string
     */
    protected $server;

    /**
     * provided: homedirectory
     *
     * @var string
     */
    protected $homeDirectory;

    /**
     * @var bool
     */
    protected $webdav;

    /**
     * @var bool
     */
    protected $samba;

    /**
     * @var bool
     */
    protected $ssh;

    /**
     * provided: external_reachability
     *
     * @var bool
     */
    protected $externalReachability;

    /**
     * @var bool
     */
    protected $readonly;

    /**
     * provided: createtime
     *
     * @var \DateTime
     */
    protected $createTime;

    /**
     * @var string|null
     */
    protected $comment;


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
     * @return SubAccount
     */
    public function setUserName(string $userName): SubAccount
    {
        $this->userName = $userName;

        return $this;
    }


    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }


    /**
     * @param string $accountId
     *
     * @return SubAccount
     */
    public function setAccountId(string $accountId): SubAccount
    {
        $this->accountId = $accountId;

        return $this;
    }


    /**
     * @return string
     */
    public function getServer(): string
    {
        return $this->server;
    }


    /**
     * @param string $server
     *
     * @return SubAccount
     */
    public function setServer(string $server): SubAccount
    {
        $this->server = $server;

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
     * @return SubAccount
     */
    public function setHomeDirectory(string $homeDirectory): SubAccount
    {
        $this->homeDirectory = $homeDirectory;

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
     * @return SubAccount
     */
    public function setWebdav(bool $webdav): SubAccount
    {
        $this->webdav = $webdav;

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
     * @return SubAccount
     */
    public function setSamba(bool $samba): SubAccount
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
     * @return SubAccount
     */
    public function setSsh(bool $ssh): SubAccount
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
     * @return SubAccount
     */
    public function setExternalReachability(bool $externalReachability): SubAccount
    {
        $this->externalReachability = $externalReachability;

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
     * @return SubAccount
     */
    public function setReadonly(bool $readonly): SubAccount
    {
        $this->readonly = $readonly;

        return $this;
    }


    /**
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime
    {
        return $this->createTime;
    }


    /**
     * @param \DateTime $createTime
     *
     * @return SubAccount
     */
    public function setCreateTime(\DateTime $createTime): SubAccount
    {
        $this->createTime = $createTime;

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
     * @return SubAccount
     */
    public function setComment(?string $comment): SubAccount
    {
        $this->comment = $comment;

        return $this;
    }
}