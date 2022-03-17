<?php

namespace HetznerRobotClient\Request;

/**
 * Class GetStorageBox
 *
 * @package HetznerRobotClient\Request
 */
class GetStorageBox
{
    public const ROUTE = '/storagebox/{storagebox-id}';

    /**
     * @var \HetznerRobotClient\Configuration
     */
    private $configuration;

    /**
     * @var \HetznerRobotClient\Dto\StorageBoxFull | null
     */
    private $result;


    /**
     * disallow direct construction
     */
    private function __construct()
    {
    }


    /**
     * @param \HetznerRobotClient\Configuration $configuration
     *
     * @return \HetznerRobotClient\Request\GetStorageBox
     */
    public static function Factory(\HetznerRobotClient\Configuration $configuration): GetStorageBox
    {
        $instance                = new static();
        $instance->configuration = $configuration;

        return $instance;
    }


    /**
     * @param int $id
     *
     * @return GetStorageBox
     */
    public function run(int $id): GetStorageBox
    {
        try {
            $configuration = $this->configuration;
            $requestor     = \HetznerRobotClient\Requestor::Factory($configuration);
            $client        = $requestor->getClient();
            $route         = $configuration->getHost() . static::ROUTE;
            $route         = \str_replace('{storagebox-id}', $id, $route);
            $response      = $client->request(
                'GET',
                $route,
                $requestor->getOptions()
            );
            $body          = $response->getBody()->getContents();
            $json          = \json_decode($body);
            $mapper        = \HetznerRobotClient\JsonMapper::get();
            $this->result  = $mapper->mapObject($json->storagebox, (new \HetznerRobotClient\Dto\StorageBoxFull()));
        } catch (\Exception $exception) {
            $this->result = null;
        }

        return $this;
    }


    /**
     * @return \HetznerRobotClient\Dto\StorageBoxFull|null
     */
    public function getResult(): ?\HetznerRobotClient\Dto\StorageBoxFull
    {
        return $this->result;
    }
}