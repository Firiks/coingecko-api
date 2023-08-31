<?php

declare(strict_types=1);

namespace Firiks\CoinGeckoApi\Api;

use Exception;

class ExchangeRates extends Api
{
    /**
     * @return array
     * @throws Exception
     */
    public function getExchangeRates(): array
    {
        return $this->get('/exchange_rates');
    }
}
