<?php

namespace HetznerRobotClient\Request\StorageBox\SubAccount;

/**
 * Class Create
 *
 * @package HetznerRobotClient\Request\StorageBox\SubAccount
 */
class Create
{
    public const ROUTE = '/storagebox/{storagebox-id}/subaccount';

    /**
     * @var \HetznerRobotClient\Configuration
     */
    private $configuration;

    /**
     * @var \HetznerRobotClient\Dto\StorageBox\CreatedSubAccount | null
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
     * @return \HetznerRobotClient\Request\StorageBox\SubAccount\Create
     */
    public static function Factory(\HetznerRobotClient\Configuration $configuration): Create
    {
        $instance                = new static();
        $instance->configuration = $configuration;

        return $instance;
    }


    /**
     * @param \HetznerRobotClient\Request\StorageBox\SubAccount\Create\Parameters $parameters
     *
     * @return \HetznerRobotClient\Request\StorageBox\SubAccount\Create
     */
    public function run(\HetznerRobotClient\Request\StorageBox\SubAccount\Create\Parameters $parameters): Create
    {
        $parameters->validate();
        try {
            $configuration          = $this->configuration;
            $requestor              = \HetznerRobotClient\Requestor::Factory($configuration);
            $client                 = $requestor->getClient();
            $route                  = $configuration->getHost() . static::ROUTE;
            $route                  = \str_replace('{storagebox-id}', $parameters->getStorageBox()->getId(), $route);
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
            $this->result           = $mapper->mapObject($json->subaccount, (new \HetznerRobotClient\Dto\StorageBox\CreatedSubAccount()));
        } catch (\Exception $exception) {
            $this->result = null;
        }

        return $this;
    }


    /**
     * @return \HetznerRobotClient\Dto\StorageBox\CreatedSubAccount | null
     */
    public function getResult(): ?\HetznerRobotClient\Dto\StorageBox\CreatedSubAccount
    {
        return $this->result;
    }
}