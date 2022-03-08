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
     * disabled from outer space
     */
    private final function __construct()
    {
        // disabled
    }


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


    /**
     * @return \HetznerRobotClient\Dto\StorageBox | null
     */
    public function getStorageBox(int $id): ?\HetznerRobotClient\Dto\StorageBox
    {
        return \HetznerRobotClient\Request\GetStorageBox::Factory($this->configuration)
                                                        ->run($id)
                                                        ->getResult()
        ;
    }


    /**
     * @param \HetznerRobotClient\Request\UpdateStorageBox\Parameters $parameters
     *
     * @return \HetznerRobotClient\Dto\StorageBox | null
     */
    public function updateStorageBox(\HetznerRobotClient\Request\UpdateStorageBox\Parameters $parameters): ?\HetznerRobotClient\Dto\StorageBox
    {
        return \HetznerRobotClient\Request\UpdateStorageBox::Factory($this->configuration)
                                                           ->run($parameters)
                                                           ->getResult()
        ;
    }
}
