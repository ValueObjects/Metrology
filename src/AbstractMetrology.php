<?php

namespace ValueObjects\Metrology;

use ValueObjects\Common\AbstractValueObject;

abstract class AbstractMetrology extends AbstractValueObject implements MetrologyInterface
{
    public const SYMBOL = '';
    protected float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public static function getSymbol(): string
    {
        return static::SYMBOL;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->observer()->notify('updating');
        $this->value = $value;
        $this->observer()->notify('updated');

        return $this;
    }

    public function __toString(): string
    {
        return $this->getValue() . ' ' . static::SYMBOL;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => static::getValueObjectName(),
            'value' => $this->getValue(),
            'symbol' => static::getSymbol()
        ];
    }
}
