<?php


namespace Acme\Model;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

class SymbolCollection implements Arrayable
{
    /**
     * @var Collection
     */
    private Collection $symbols;

    /**
     * @param array $array
     * @return SymbolCollection
     */
    public static function fromArray(array $array)
    {
        $collection = new self();
        return $collection->setSymbols(
            collect($array)->map(
                function ($item) {
                    return Symbol::fromArray($item);
                }
            )
        );
    }

    /**
     * @return Collection
     */
    public function getSymbols(): Collection
    {
        return $this->symbols;
    }

    /**
     * @param Collection $symbols
     * @return SymbolCollection
     */
    public function setSymbols(Collection $symbols): SymbolCollection
    {
        $this->symbols = $symbols;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->symbols->toArray();
    }
}
