<?php

declare(strict_types=1);

namespace Firiks\CoinGeckoApi\Tests\Api;

use Firiks\CoinGeckoApi\Api\Ping;
use Firiks\CoinGeckoApi\CoinGeckoClient;

class PingTest extends ApiTestCase
{
    public function testPing()
    {
        $api = new Ping(new CoinGeckoClient($this->getMockClient()));
        $api->ping();

        $this->assertEquals('/api/v3/ping', $this->getLastRequest()->getUri()->__toString());
    }
}
