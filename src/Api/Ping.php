<?php

declare(strict_types=1);

namespace Firiks\CoinGeckoApi\Api;

use Exception;

class Ping extends Api
{
    /**
     * @return array
     * @throws Exception
     */
    public function ping(): array
    {
        return $this->get('/ping');
    }
}
