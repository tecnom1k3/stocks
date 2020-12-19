<?php


namespace Acme\Model;


use Acme\Service\Contract\JsonMapperServiceInterface;
use Acme\Service\JsonMapperService;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Symbol
 * @package Acme\Model
 */
class Symbol implements Arrayable, ModelInterface
{

    /**
     * @var string
     */
    protected string $currency;

    /**
     * @var string
     */
    protected string $description;

    /**
     * @var string
     */
    protected string $displaySymbol;

    /**
     * @var string
     */
    protected string $type;

    /**
     * @var string
     */
    protected string $symbol;

    /**
     * @param array $array $array
     * @return ModelInterface
     */
    public static function fromArray(array $array): ModelInterface
    {
        /** @var JsonMapperService $mapper */
        $mapper = app(JsonMapperServiceInterface::class);
        return $mapper->map($array, self::class);
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
