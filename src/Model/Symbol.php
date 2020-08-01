<?php


namespace Acme\Model;


use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Symbol
 * @package Acme\Model
 */
class Symbol implements Arrayable
{

    /**
     * @var string
     */
    private string $currency;
    /**
     * @var string
     */
    private string $description;
    /**
     * @var string
     */
    private string $displaySymbol;
    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $symbol;

    /**
     * @param array $array
     * @return Symbol
     */
    public static function fromArray(array $array)
    {
        $symbol = new self();
        $symbol->setCurrency($array['currency'])
            ->setDescription($array['description'])
            ->setDisplaySymbol($array['displaySymbol'])
            ->setSymbol($array['symbol'])
            ->setType($array['type']);
        return $symbol;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Symbol
     */
    public function setCurrency(string $currency): Symbol
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Symbol
     */
    public function setDescription(string $description): Symbol
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisplaySymbol(): string
    {
        return $this->displaySymbol;
    }

    /**
     * @param string $displaySymbol
     * @return Symbol
     */
    public function setDisplaySymbol(string $displaySymbol): Symbol
    {
        $this->displaySymbol = $displaySymbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Symbol
     */
    public function setType(string $type): Symbol
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return Symbol
     */
    public function setSymbol(string $symbol): Symbol
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "currency" => $this->currency,
            "description" => $this->description,
            "displaySymbol" => $this->displaySymbol,
            "symbol" => $this->symbol,
            "type" => $this->type
        ];
    }
}
