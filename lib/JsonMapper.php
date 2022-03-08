<?php

namespace HetznerRobotClient;

/**
 * Class JsonMapper
 *
 * @package HetznerRobotClient
 */
class JsonMapper
{
    /**
     * @return \JsonMapper\JsonMapperInterface
     */
    public static function get(): \JsonMapper\JsonMapperInterface
    {
        $mapper = (new \JsonMapper\JsonMapperFactory())->default();
        static::addMappings($mapper);
        static::addLogger($mapper);

        return $mapper;
    }


    /**
     * @param \JsonMapper\JsonMapperInterface $mapper
     *
     * @return void
     */
    private static function addMappings(\JsonMapper\JsonMapperInterface $mapper)
    {
        $rename = new \JsonMapper\Middleware\Rename\Rename();
        {
            #\\HetznerRobotClient\Dto\StorageBox
            $rename->addMapping(\HetznerRobotClient\Dto\StorageBox::class, 'linked_server', 'linkedServer');
            $rename->addMapping(\HetznerRobotClient\Dto\StorageBox::class, 'paid_until', 'paidUntil');
        }
        {
            #\\HetznerRobotClient\Dto\StorageBoxFull
            $rename->addMapping(\HetznerRobotClient\Dto\StorageBoxFull::class, 'disk_quota', 'diskQuota');
            $rename->addMapping(\HetznerRobotClient\Dto\StorageBoxFull::class, 'disk_usage', 'diskUsage');
            $rename->addMapping(\HetznerRobotClient\Dto\StorageBoxFull::class, 'disk_usage_data', 'diskUsageData');
            $rename->addMapping(\HetznerRobotClient\Dto\StorageBoxFull::class, 'disk_usage_snapshots', 'diskUsageSnapshots');
            $rename->addMapping(\HetznerRobotClient\Dto\StorageBoxFull::class, 'external_reachability', 'externalReachability');
            $rename->addMapping(\HetznerRobotClient\Dto\StorageBoxFull::class, 'host_system', 'hostSystem');
        }
        $mapper->unshift($rename);
    }


    /**
     * @param \JsonMapper\JsonMapperInterface $mapper
     *
     * @return void
     */
    private static function addLogger(\JsonMapper\JsonMapperInterface $mapper)
    {
        $logger = new \Psr\Log\Test\TestLogger();
        $mapper->push(new \JsonMapper\Middleware\Debugger($logger));
    }
}
