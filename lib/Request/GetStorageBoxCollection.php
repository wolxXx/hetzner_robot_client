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
        $client = new \GuzzleHttp\Client();
        try {
            $configuration    = $this->configuration;
            $route            = $configuration->getHost() . static::ROUTE;
            $res              = $client->request(
                'GET',
                $route,
                [
                    'debug' => $configuration->shallDebugRequests(),
                    'auth'  => [
                        $configuration->getUsername(),
                        $configuration->getPassword(),
                    ],
                ]
            );
            $body             = $res->getBody()->getContents();
            $json             = \json_decode($body);
            $this->collection = new \HetznerRobotClient\Dto\StorageBoxCollection();
            foreach ($json as $item) {
                $this->collection->addItem(
                    (new \HetznerRobotClient\Dto\StorageBox())
                        ->setId($item->storagebox->id)
                        ->setLogin($item->storagebox->login)
                        ->setName($item->storagebox->name)
                        ->setProduct($item->storagebox->product)
                        ->setCancelled($item->storagebox->cancelled)
                        ->setLocked($item->storagebox->locked)
                        ->setLocation($item->storagebox->location)
                        ->setLinkedServer($item->storagebox->linked_server)
                        ->setPaidUntil(new \DateTime($item->storagebox->paid_until))
                );
            }
        } catch (\Exception $exception) {
            throw $exception;
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