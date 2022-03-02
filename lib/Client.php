<?php

namespace HetznerRobotClient;

/**
 * Class Client
 *
 * @package HetznerRobotClient
 */
class Client
{
    /**
     * @var \HetznerRobotClient\Configuration
     */
    private $configuration;


    /**
     * @param \HetznerRobotClient\Configuration $configuration
     *
     * @return \HetznerRobotClient\Client
     */
    public static function Factory(Configuration $configuration): Client
    {
        $instance                = new static();
        $instance->configuration = $configuration;

        return $instance;
    }


    /**
     * @return \HetznerRobotClient\Dto\StorageBoxCollection
     */
    public function getAllStorageBoxes(): \HetznerRobotClient\Dto\StorageBoxCollection
    {
        return \HetznerRobotClient\Request\GetStorageBoxCollection::Factory($this->configuration)
                                                                  ->run()
                                                                  ->getResult()
        ;
    }
}
