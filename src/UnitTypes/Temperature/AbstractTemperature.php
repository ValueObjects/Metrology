<?php

namespace ValueObjects\Metrology\UnitTypes\Temperature;

use ValueObjects\Metrology\AbstractMetrology;
use ValueObjects\Metrology\Contracts\UnitTypes\Temperature\TemperatureInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\Temperature\TemperatureCalculatorInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\Temperature\TemperatureComparatorInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\Temperature\TemperatureConverterInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\Temperature\TemperatureObserverManagerInterface;

abstract class AbstractTemperature extends AbstractMetrology implements TemperatureInterface
{
    protected ?TemperatureCalculatorInterface $calculator = null;
    protected ?TemperatureComparatorInterface $comparator = null;
    protected ?TemperatureConverterInterface $converter = null;
    protected ?TemperatureObserverManagerInterface $observerManager = null;

    public function calculate(TemperatureCalculatorInterface $calculator = null): TemperatureCalculatorInterface
    {
        if ($calculator !== null) {
            $this->calculator = new $calculator($this);
        } else {
            if ($this->calculator === null) {
                $this->calculator = new TemperatureCalculator($this);
            }
        }

        return $this->calculator;
    }

    public function compare(TemperatureComparatorInterface $comparator = null): TemperatureComparatorInterface
    {
        if ($comparator !== null) {
            $this->comparator = new $comparator($this);
        } else {
            if ($this->comparator === null) {
                $this->comparator = new TemperatureComparator($this);
            }
        }

        return $this->comparator;
    }

    public function convert(TemperatureConverterInterface $converter = null): TemperatureConverterInterface
    {
        if ($converter !== null) {
            $this->converter = new $converter($this);
        } else {
            if ($this->converter === null) {
                $this->converter = new TemperatureConverter($this);
            }
        }

        return $this->converter;
    }

    public function observer(TemperatureObserverManagerInterface $observerManager = null): TemperatureObserverManagerInterface
    {
        if ($observerManager !== null) {
            $this->observerManager = new $observerManager($this);
        } else {
            if ($this->observerManager === null) {
                $this->observerManager = new TemperatureObserverManager($this);
            }
        }

        return $this->observerManager;
    }

    public function __destruct()
    {
        $this->observer()->notify('destroy');
    }
}
