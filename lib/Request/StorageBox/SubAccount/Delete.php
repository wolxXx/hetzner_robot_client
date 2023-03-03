<?php

namespace HetznerRobotClient\Request\StorageBox\SubAccount;

/**
 * Class Delete
 *
 * @package HetznerRobotClient\Request\StorageBox\SubAccount
 */
class Delete
{
    public const ROUTE = '/storagebox/{storagebox-id}/subaccount/{sub-account-username}';

    /**
     * @var \HetznerRobotClient\Configuration
     */
    private $configuration;

    /**
     * @var bool
     */
    private $result = false;


    /**
     * disallow direct construction
     */
    private function __construct()
    {
    }


    /**
     * @param \HetznerRobotClient\Configuration $configuration
     *
     * @return \HetznerRobotClient\Request\StorageBox\SubAccount\Delete
     */
    public static function Factory(\HetznerRobotClient\Configuration $configuration): Delete
    {
        $instance                = new static();
        $instance->configuration = $configuration;

        return $instance;
    }


    /**
     * @param \HetznerRobotClient\Request\StorageBox\SubAccount\Delete\Parameters $parameters
     *
     * @return \HetznerRobotClient\Request\StorageBox\SubAccount\Delete
     */
    public function run(\HetznerRobotClient\Request\StorageBox\SubAccount\Delete\Parameters $parameters): Delete
    {
        $parameters->validate();
        try {
            $configuration = $this->configuration;
            $requestor     = \HetznerRobotClient\Requestor::Factory($configuration);
            $client        = $requestor->getClient();
            $route         = $configuration->getHost() . static::ROUTE;
            $route         = \str_replace('{storagebox-id}', $parameters->getStorageBox()->getId(), $route);
            $route         = \str_replace('{sub-account-username}', $parameters->getUserName(), $route);
            $options       = $requestor->getOptions();
            $client->request(
                'DELETE',
                $route,
                $options
            );
            $this->result = true;
        } catch (\Exception $exception) {
            $this->result = false;
        }

        return $this;
    }


    /**
     * @return bool
     */
    public function getResult(): bool
    {
        return $this->result;
    }
}