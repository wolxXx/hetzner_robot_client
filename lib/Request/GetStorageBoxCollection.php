<?php

namespace HetznerRobotClient\Request;

/**
 * Class GetStorageBoxCollection
 *
 * @package HetznerRobotClient\Request
 */
class GetStorageBoxCollection
{
    public const ROUTE = '/storagebox';

    /**
     * @var \HetznerRobotClient\Configuration
     */
    private $configuration;

    /**
     * @var \HetznerRobotClient\Dto\StorageBoxCollection
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
     * @return \HetznerRobotClient\Request\GetStorageBoxCollection
     */
    public static function Factory(\HetznerRobotClient\Configuration $configuration): GetStorageBoxCollection
    {
        $instance                = new static();
        $instance->configuration = $configuration;

        return $instance;
    }


    /**
     * @return GetStorageBoxCollection
     */
    public function run(): GetStorageBoxCollection
    {
        $configuration    = $this->configuration;
        
        $requestor = \HetznerRobotClient\Requestor::Factory($configuration);
        $client = $requestor->getClient();
        
        $route            = $configuration->getHost() . static::ROUTE;
        $response         = $client->request(
            'GET',
            $route,
            $requestor->getOptions()
        );
        $body             = $response->getBody()->getContents();
        $json             = \json_decode($body);
        $this->collection = new \HetznerRobotClient\Dto\StorageBoxCollection();
        $mapper           = \HetznerRobotClient\JsonMapper::get();
        foreach ($json as $item) {
            $this->collection->addItem($mapper->mapObject($item->storagebox, (new \HetznerRobotClient\Dto\StorageBox())));
        }

        return $this;
    }


    /**
     * @return \HetznerRobotClient\Dto\StorageBoxCollection
     */
    public function getResult(): \HetznerRobotClient\Dto\StorageBoxCollection
    {
        return $this->collection;
    }
}