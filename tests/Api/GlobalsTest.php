<?php

declare(strict_types=1);

namespace Firiks\CoinGeckoApi\Tests\Api;

use Firiks\CoinGeckoApi\Api\Globals;
use Firiks\CoinGeckoApi\CoinGeckoClient;

class GlobalsTest extends ApiTestCase
{
    public function testGlobal()
    {
        $api = new Globals(new CoinGeckoClient($this->getMockClient()));
        $api->getGlobal();

        $this->assertEquals('/api/v3/global', $this->getLastRequest()->getUri()->__toString());
    }
}
