<?php

namespace HetznerRobotClient;

class Configuration
{
    /**
     * @var string
     */
    private $host = 'https://robot-ws.your-server.de';

    /**
     * @var string
     */
    private $username = '__define_me__';

    /**
     * @var string
     */
    private $password = '__define_me__';

    /**
     * @var bool
     */
    private $debugRequests = false;


    /**
     * @param string        $username
     * @param string        $password
     * @param string | null $host
     *
     * @return Configuration
     */
    public static function Factory(string $username, string $password, ?string $host = null): Configuration
    {
        $instance = (new static())
            ->setUsername($username)
            ->setPassword($password);
        if (null !== $host) {
            $instance->setHost($host);
        }

        return $instance;
    }


    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }


    /**
     * @param string $host
     *
     * @return Configuration
     */
    public function setHost(string $host): Configuration
    {
        $this->host = $host;

        return $this;
    }


    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }


    /**
     * @param string $username
     *
     * @return Configuration
     */
    public function setUsername(string $username): Configuration
    {
        $this->username = $username;

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
     * @return Configuration
     */
    public function setPassword(string $password): Configuration
    {
        $this->password = $password;

        return $this;
    }


    /**
     * @return bool
     */
    public function shallDebugRequests(): bool
    {
        return $this->debugRequests;
    }


    /**
     * @param bool $debugRequests
     *
     * @return Configuration
     */
    public function setDebugRequests(bool $debugRequests): Configuration
    {
        $this->debugRequests = $debugRequests;

        return $this;
    }
}


