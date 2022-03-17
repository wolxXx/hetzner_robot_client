<?php

namespace HetznerRobotClient\Dto\StorageBox;

/**
 * Class CreatedSubAccount
 *
 * @package HetznerRobotClient\Dto\StorageBox
 */
class CreatedSubAccount
{
    /**
     * provided: username
     *
     * @var string
     */
    protected $userName;

    /**
     * @var string
     */
    protected $password;

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
     * @var string
     */
    protected $homedirectory;


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
     * @return CreatedSubAccount
     */
    public function setUserName(string $userName): CreatedSubAccount
    {
        $this->userName = $userName;

        return $this;
    }


    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


    /**
     * @param string $password
     *
     * @return CreatedSubAccount
     */
    public function setPassword(string $password): CreatedSubAccount
    {
        $this->password = $password;

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
     * @return CreatedSubAccount
     */
    public function setAccountId(string $accountId): CreatedSubAccount
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
     * @return CreatedSubAccount
     */
    public function setServer(string $server): CreatedSubAccount
    {
        $this->server = $server;

        return $this;
    }


    /**
     * @return string
     */
    public function getHomedirectory(): string
    {
        return $this->homedirectory;
    }


    /**
     * @param string $homedirectory
     *
     * @return CreatedSubAccount
     */
    public function setHomedirectory(string $homedirectory): CreatedSubAccount
    {
        $this->homedirectory = $homedirectory;

        return $this;
    }
}