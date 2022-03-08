<?php

namespace HetznerRobotClient;

/**
 * Class Requestor
 *
 * @package HetznerRobotClient
 */
class Requestor
{
    /**
     * @var Configuration
     */
    private $configuration;


    /**
     * disabled from outer space
     */
    private final function __construct()
    {
        // disabled
    }


    /**
     * @param \HetznerRobotClient\Configuration $configuration
     *
     * @return \HetznerRobotClient\Requestor
     */
    public static function Factory(Configuration $configuration): Requestor
    {
        $instance                = new static();
        $instance->configuration = $configuration;

        return $instance;
    }


    /**
     * @param \HetznerRobotClient\Configuration $configuration
     *
     * @return \GuzzleHttp\Client
     */
    public function getClient(): \GuzzleHttp\Client
    {

        if (null !== $this->configuration->getMockHandler()) {
            return new \GuzzleHttp\Client(['handler' => $this->configuration->getMockHandler()]);
        }

        return new \GuzzleHttp\Client();;
    }


    /**
     * @return array
     */
    public function getOptions(): array
    {
        return [
            'debug' => $this->configuration->shallDebugRequests(),
            'auth'  => [
                $this->configuration->getUsername(),
                $this->configuration->getPassword(),
            ],
        ];
    }
}
