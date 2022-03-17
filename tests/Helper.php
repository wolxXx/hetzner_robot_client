<?php

namespace HetznerRobotClientTest;

class Helper
{
    /**
     * @param     $data
     * @param int $statusCode
     *
     * @return \GuzzleHttp\HandlerStack
     */
    public static function getMockHandler($data, int $statusCode = 200): \GuzzleHttp\HandlerStack
    {
        $mock = new \GuzzleHttp\Handler\MockHandler([
            new \GuzzleHttp\Psr7\Response($statusCode, [], \json_encode($data, \JSON_PRETTY_PRINT)),
        ]);

        return \GuzzleHttp\HandlerStack::create($mock);
    }
}