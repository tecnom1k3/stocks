<?php


namespace Acme\Model;


/**
 * Class Profile
 * @package Acme\Model
 */
class Profile implements ModelInterface
{
    /**
     * @var string
     */
    public string $country;

    /**
     * @var string
     */
    public string $currency;

    /**
     * @var string
     */
    public string $exchange;

    /**
     * @var int
     */
    public int $marketCapitalization;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var float
     */
    public float $shareOutstanding;

    /**
     * @var string
     */
    public string $ticker;
}
