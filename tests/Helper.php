<?php

namespace HetznerRobotClientTest;

class Helper
{
    /**
     * @param $data
     *
     * @return \GuzzleHttp\HandlerStack
     */
    public static function getMockHandler($data): \GuzzleHttp\HandlerStack
    {
        $mock = new \GuzzleHttp\Handler\MockHandler([
            new \GuzzleHttp\Psr7\Response(200, [], \json_encode($data, \JSON_PRETTY_PRINT)),
        ]);

        return \GuzzleHttp\HandlerStack::create($mock);
    }
}