<?php

declare(strict_types=1);

namespace Firiks\CoinGeckoApi;

use Firiks\CoinGeckoApi\Api\Coins;
use Firiks\CoinGeckoApi\Api\Contract;
use Firiks\CoinGeckoApi\Api\Derivatives;
use Firiks\CoinGeckoApi\Api\Events;
use Firiks\CoinGeckoApi\Api\ExchangeRates;
use Firiks\CoinGeckoApi\Api\Exchanges;
use Firiks\CoinGeckoApi\Api\Finance;
use Firiks\CoinGeckoApi\Api\Globals;
use Firiks\CoinGeckoApi\Api\Indexes;
use Firiks\CoinGeckoApi\Api\Ping;
use Firiks\CoinGeckoApi\Api\Simple;
use Firiks\CoinGeckoApi\Api\StatusUpdates;
use Exception;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class CoinGeckoClient
 * @package Firiks\CoinGeckoApi
 */
class CoinGeckoClient
{
    protected const BASE_URI = 'https://api.coingecko.com';
    protected const BASE_URI_PRO_PLAN = 'https://pro-api.coingecko.com';

    /** @var Client */
    private $httpClient;

    /** @var null|string */
    private $apiKey = null;

    /** @var ResponseInterface|null */
    protected $lastResponse;

    public function __construct(?Client $client = null, ?string $apiKey = null)
    {
        if(!empty($apiKey)) {
            $this->setApiKey($apiKey);
        }

        $this->httpClient = $client ?: new Client(['base_uri' => $apiKey ? self::BASE_URI_PRO_PLAN : self::BASE_URI]);
    }

    public function setApiKey(string $key)
    {
        $this->apiKey = $key;
    }

    public function getApiKey(): ?string {
        return $this->apiKey;
    }

    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function ping(): array
    {
        return (new Ping($this))->ping();
    }

    public function simple(): Simple
    {
        return new Simple($this);
    }

    public function coins(): Coins
    {
        return new Coins($this);
    }

    public function contract(): Contract
    {
        return new Contract($this);
    }

    public function exchanges(): Exchanges
    {
        return new Exchanges($this);
    }

    public function finance(): Finance
    {
        return new Finance($this);
    }

    public function indexes(): Indexes
    {
        return new Indexes($this);
    }

    public function derivatives(): Derivatives
    {
        return new Derivatives($this);
    }

    public function statusUpdates(): StatusUpdates
    {
        return new StatusUpdates($this);
    }

    public function events(): Events
    {
        return new Events($this);
    }

    public function exchangeRates(): ExchangeRates
    {
        return new ExchangeRates($this);
    }

    public function globals(): Globals
    {
        return new Globals($this);
    }

    public function setLastResponse(ResponseInterface $response)
    {
        return $this->lastResponse = $response;
    }

    public function getLastResponse(): ?ResponseInterface
    {
        return $this->lastResponse;
    }
}
