<?php

namespace App\Http\Filter\Product;

use App\Http\Filter\Filter;
use App\Http\Filter\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class MultipleFilter extends Filter implements FilterInterface
{
    protected array $properties;

    protected Builder $builder;

    public function setData(MultipleFilterDto $dto): self
    {
        $this->properties = $dto->properties;
        $this->ready = true;
        return $this;
    }

    public function apply(Builder $builder): Builder
    {
        if (!$this->isReady()) {
            throw new \DomainException('Data does\'nt set');
        }
        $this->builder = $builder;

        foreach ($this->properties as $name => $option) {
            $this->multiple($name, $option);
        }

        return $this->builder;
    }

    protected function multiple(string $name, array $options): void
    {
        foreach ($options as $option) {
            $this->builder->orWhereHas('properties', function ($propertyQuery) use($name, $option){
                $propertyQuery->whereHas('name', function ($nameQuery) use ($name){
                    $nameQuery->where('name', $name);
                });
                $propertyQuery->whereHas('value', function ($valueQuery) use ($option){
                    $valueQuery->where('value', $option);
                });
            });
        }
    }
}
