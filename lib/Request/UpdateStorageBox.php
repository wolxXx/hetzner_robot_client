<?php

namespace HetznerRobotClient\Request;

/**
 * Class GetStorageBox
 *
 * @package HetznerRobotClient\Request
 */
class UpdateStorageBox
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
     * @return \HetznerRobotClient\Request\UpdateStorageBox
     */
    public static function Factory(\HetznerRobotClient\Configuration $configuration): UpdateStorageBox
    {
        $instance = new static();
        $instance->setConfiguration($configuration);

        return $instance;
    }


    /**
     * @param \HetznerRobotClient\Request\UpdateStorageBox\Parameters $parameters
     *
     * @return $this
     */
    public function run(\HetznerRobotClient\Request\UpdateStorageBox\Parameters $parameters): UpdateStorageBox
    {
        $parameters->validate();
        try {
            $configuration          = $this->getConfiguration();
            $requestor              = \HetznerRobotClient\Requestor::Factory($configuration);
            $client                 = $requestor->getClient();
            $route                  = $configuration->getHost() . static::ROUTE;
            $route                  = \str_replace('{storagebox-id}', $parameters->getId(), $route);
            $options                = $requestor->getOptions();
            $options['form_params'] = $parameters->getData();
            $response               = $client->request(
                'POST',
                $route,
                $options
            );
            $body                   = $response->getBody()->getContents();
            $json                   = \json_decode($body);
            $mapper                 = \HetznerRobotClient\JsonMapper::get();
            $this->result           = $mapper->mapObject($json->storagebox, (new \HetznerRobotClient\Dto\StorageBoxFull()));
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


    /**
     * @return \HetznerRobotClient\Configuration
     */
    public function getConfiguration(): \HetznerRobotClient\Configuration
    {
        return $this->configuration;
    }


    /**
     * @param \HetznerRobotClient\Configuration $configuration
     *
     * @return UpdateStorageBox
     */
    public function setConfiguration(\HetznerRobotClient\Configuration $configuration): UpdateStorageBox
    {
        $this->configuration = $configuration;

        return $this;
    }
}