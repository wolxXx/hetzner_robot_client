<?php

namespace HetznerRobotClient\Request\StorageBox\SubAccount;

/**
 * Class Listing
 *
 * @package HetznerRobotClient\Request\StorageBox\SubAccount
 */
class Listing
{
    public const ROUTE = '/storagebox/{storagebox-id}/subaccount';

    /**
     * @var \HetznerRobotClient\Configuration
     */
    private $configuration;

    /**
     * @var \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
     */
    private $collection;


    /**
     * disallow direct construction
     */
    private function __construct()
    {
    }


    /**
     * @param \HetznerRobotClient\Configuration $configuration
     *
     * @return \HetznerRobotClient\Request\StorageBox\SubAccount\Listing
     */
    public static function Factory(\HetznerRobotClient\Configuration $configuration): Listing
    {
        $instance                = new static();
        $instance->configuration = $configuration;

        return $instance;
    }


    /**
     * @param \HetznerRobotClient\Dto\StorageBox $storageBox
     *
     * @return $this
     */
    public function run(\HetznerRobotClient\Dto\StorageBox $storageBox): Listing
    {
        $this->collection = new \HetznerRobotClient\Dto\StorageBox\SubAccountCollection();
        $configuration    = $this->configuration;
        $requestor        = \HetznerRobotClient\Requestor::Factory($configuration);
        $client           = $requestor->getClient();
        $route            = $configuration->getHost() . static::ROUTE;
        $route            = \str_replace('{storagebox-id}', $storageBox->getId(), $route);
        $response         = $client->request(
            'GET',
            $route,
            $requestor->getOptions()
        );
        $body             = $response->getBody()->getContents();
        $json             = \json_decode($body);
        $mapper           = \HetznerRobotClient\JsonMapper::get();
        foreach ($json as $item) {
            $this->collection->addItem($mapper->mapObject($item->subaccount, (new \HetznerRobotClient\Dto\StorageBox\SubAccount())));
        }

        return $this;
    }


    /**
     * @return \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
     */
    public function getResult(): \HetznerRobotClient\Dto\StorageBox\SubAccountCollection
    {
        return $this->collection;
    }
}