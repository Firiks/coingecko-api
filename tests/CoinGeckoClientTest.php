<?php

declare(strict_types=1);

namespace Firiks\CoinGeckoApi\Tests;

use Firiks\CoinGeckoApi\Api\Coins;
use Firiks\CoinGeckoApi\Api\Contract;
use Firiks\CoinGeckoApi\Api\Derivatives;
use Firiks\CoinGeckoApi\Api\Events;
use Firiks\CoinGeckoApi\Api\ExchangeRates;
use Firiks\CoinGeckoApi\Api\Exchanges;
use Firiks\CoinGeckoApi\Api\Finance;
use Firiks\CoinGeckoApi\Api\Globals;
use Firiks\CoinGeckoApi\Api\Indexes;
use Firiks\CoinGeckoApi\Api\Simple;
use Firiks\CoinGeckoApi\Api\StatusUpdates;
use Firiks\CoinGeckoApi\CoinGeckoClient;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class CoinGeckoClientTest extends TestCase
{
    public function testGetBaseClient()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Client::class, $client->getHttpClient());
    }

    public function testPing()
    {
        $client = new CoinGeckoClient();

        $this->assertIsArray($client->ping());
    }

    public function testSimple()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Simple::class, $client->simple());
    }

    public function testCoins()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Coins::class, $client->coins());
    }

    public function testContract()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Contract::class, $client->contract());
    }

    public function testExchanges()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Exchanges::class, $client->exchanges());
    }

    public function testFinance()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Finance::class, $client->finance());
    }

    public function testIndexes()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Indexes::class, $client->indexes());
    }

    public function testDerivatives()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Derivatives::class, $client->derivatives());
    }

    public function testStatusUpdates()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(StatusUpdates::class, $client->statusUpdates());
    }

    public function testEvents()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Events::class, $client->events());
    }

    public function testExchangeRates()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(ExchangeRates::class, $client->exchangeRates());
    }

    public function testGlobals()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Globals::class, $client->globals());
    }

    public function testGetLastResponseIsNull()
    {
        $client = new CoinGeckoClient();

        $this->assertNull($client->getLastResponse());
    }

    public function testSetLastResponse()
    {
        $client = new CoinGeckoClient();
        $response = $this->createMock(ResponseInterface::class);
        $client->setLastResponse($response);

        $this->assertInstanceOf(ResponseInterface::class, $client->getLastResponse());
    }
}
