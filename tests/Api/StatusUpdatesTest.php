<?php

declare(strict_types=1);

namespace Firiks\CoinGeckoApi\Tests\Api;

use Firiks\CoinGeckoApi\Api\StatusUpdates;
use Firiks\CoinGeckoApi\CoinGeckoClient;

class StatusUpdatesTest extends ApiTestCase
{
    public function testGlobal()
    {
        $api = new StatusUpdates(new CoinGeckoClient($this->getMockClient()));
        $api->getStatusUpdates();

        $this->assertEquals('/api/v3/status_updates', $this->getLastRequest()->getUri()->__toString());
    }
}
