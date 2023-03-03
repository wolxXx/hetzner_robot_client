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


    /**
     * @param \HetznerRobotClient\Dto\StorageBox $storageBox
     *
     * @return \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
     */
    public function getStorageBoxSubAccounts(\HetznerRobotClient\Dto\StorageBox $storageBox): \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
    {
        return \HetznerRobotClient\Request\StorageBox\SubAccount\Listing::Factory($this->configuration)
                                                                        ->run($storageBox)
                                                                        ->getResult()
        ;
    }


    /**
     * @param \HetznerRobotClient\Request\StorageBox\SubAccount\Create\Parameters $parameters
     *
     * @return \HetznerRobotClient\Dto\StorageBox\CreatedSubAccount|null
     */
    public function createStorageBoxSubAccount(\HetznerRobotClient\Request\StorageBox\SubAccount\Create\Parameters $parameters): ?Dto\StorageBox\CreatedSubAccount
    {
        return \HetznerRobotClient\Request\StorageBox\SubAccount\Create::Factory($this->configuration)
                                                                       ->run($parameters)
                                                                       ->getResult()
        ;
    }


    /**
     * @param \HetznerRobotClient\Request\StorageBox\SubAccount\Delete\Parameters $parameters
     *
     * @return bool
     */
    public function deleteStorageBoxSubAccount(\HetznerRobotClient\Request\StorageBox\SubAccount\Delete\Parameters $parameters): bool
    {
        return \HetznerRobotClient\Request\StorageBox\SubAccount\Delete::Factory($this->configuration)
                                                                       ->run($parameters)
                                                                       ->getResult()
        ;
    }
}
