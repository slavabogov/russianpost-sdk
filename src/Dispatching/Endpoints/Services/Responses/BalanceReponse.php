<?php

declare(strict_types=1);

namespace Appwilio\RussianPostSDK\Dispatching\Endpoints\Services\Responses;

use JMS\Serializer\Annotation as JMS;

final class BalanceReponse
{
    /**
     * @JMS\Type("float")
     * @var float
     */
    private $balance;

    /**
     * @JMS\SerializedName("balance-date")
     * @JMS\Type("DateTimeImmutable<'Y-m-d'>")
     * @var \DateTimeImmutable
     */
    private $date;

    /**
     * @JMS\SerializedName("work-with-balance")
     * @JMS\Type("bool")
     * @var bool
     */
    private $withBalance;

    /**
     * @JMS\SerializedName("error-message")
     * @JMS\Type("string")
     * @var string
     */
    private $error;

    public function getValue(): float
    {
        if ($this->withBalance) {
            return $this->balance;
        }

        throw new \Exception($this->error);
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }
}
