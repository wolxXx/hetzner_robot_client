<?php

namespace HetznerRobotClient\Dto;

/**
 * Class StorageBoxFull
 *
 * @package HetznerRobotClient\Dto
 */
class StorageBoxFull extends StorageBox
{
    /**
     * @var int
     */
    protected $diskQuota;

    /**
     * @var int
     */
    protected $diskUsage;

    /**
     * @var int
     */
    protected $diskUsageData;

    /**
     * @var int
     */
    protected $diskUsageSnapshots;

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
     * @var bool
     */
    protected $externalReachability;

    /**
     * @var bool
     */
    protected $zfs;

    /**
     * @var string
     */
    protected $server;

    /**
     * @var string
     */
    protected $hostSystem;


    /**
     * @return int
     */
    public function getDiskQuota(): int
    {
        return $this->diskQuota;
    }


    /**
     * @param int $diskQuota
     *
     * @return StorageBoxFull
     */
    public function setDiskQuota(int $diskQuota): StorageBoxFull
    {
        $this->diskQuota = $diskQuota;

        return $this;
    }


    /**
     * @return int
     */
    public function getDiskUsage(): int
    {
        return $this->diskUsage;
    }


    /**
     * @param int $diskUsage
     *
     * @return StorageBoxFull
     */
    public function setDiskUsage(int $diskUsage): StorageBoxFull
    {
        $this->diskUsage = $diskUsage;

        return $this;
    }


    /**
     * @return int
     */
    public function getDiskUsageData(): int
    {
        return $this->diskUsageData;
    }


    /**
     * @param int $diskUsageData
     *
     * @return StorageBoxFull
     */
    public function setDiskUsageData(int $diskUsageData): StorageBoxFull
    {
        $this->diskUsageData = $diskUsageData;

        return $this;
    }


    /**
     * @return int
     */
    public function getDiskUsageSnapshots(): int
    {
        return $this->diskUsageSnapshots;
    }


    /**
     * @param int $diskUsageSnapshots
     *
     * @return StorageBoxFull
     */
    public function setDiskUsageSnapshots(int $diskUsageSnapshots): StorageBoxFull
    {
        $this->diskUsageSnapshots = $diskUsageSnapshots;

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
     * @return StorageBoxFull
     */
    public function setWebdav(bool $webdav): StorageBoxFull
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
     * @return StorageBoxFull
     */
    public function setSamba(bool $samba): StorageBoxFull
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
     * @return StorageBoxFull
     */
    public function setSsh(bool $ssh): StorageBoxFull
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
     * @return StorageBoxFull
     */
    public function setExternalReachability(bool $externalReachability): StorageBoxFull
    {
        $this->externalReachability = $externalReachability;

        return $this;
    }


    /**
     * @return bool
     */
    public function isZfs(): bool
    {
        return $this->zfs;
    }


    /**
     * @param bool $zfs
     *
     * @return StorageBoxFull
     */
    public function setZfs(bool $zfs): StorageBoxFull
    {
        $this->zfs = $zfs;

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
     * @return StorageBoxFull
     */
    public function setServer(string $server): StorageBoxFull
    {
        $this->server = $server;

        return $this;
    }


    /**
     * @return string
     */
    public function getHostSystem(): string
    {
        return $this->hostSystem;
    }


    /**
     * @param string $hostSystem
     *
     * @return StorageBoxFull
     */
    public function setHostSystem(string $hostSystem): StorageBoxFull
    {
        $this->hostSystem = $hostSystem;

        return $this;
    }
}