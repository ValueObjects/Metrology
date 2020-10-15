<?php

namespace ValueObjects\Metrology\UnitTypes\DigitalInformation;

use ValueObjects\Metrology\AbstractMetrology;
use ValueObjects\Metrology\Contracts\UnitTypes\DigitalInformation\DigitalInformationInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\DigitalInformation\DigitalInformationCalculatorInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\DigitalInformation\DigitalInformationComparatorInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\DigitalInformation\DigitalInformationConverterInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\DigitalInformation\DigitalInformationObserverManagerInterface;

abstract class AbstractDigitalInformation extends AbstractMetrology implements DigitalInformationInterface
{
    protected ?DigitalInformationCalculatorInterface $calculator = null;
    protected ?DigitalInformationComparatorInterface $comparator = null;
    protected ?DigitalInformationConverterInterface $converter = null;
    protected ?DigitalInformationObserverManagerInterface $observerManager = null;

    public function calculate(DigitalInformationCalculatorInterface $calculator = null): DigitalInformationCalculatorInterface
    {
        if ($calculator !== null) {
            $this->calculator = new $calculator($this);
        } else {
            if ($this->calculator === null) {
                $this->calculator = new DigitalInformationCalculator($this);
            }
        }

        return $this->calculator;
    }

    public function compare(DigitalInformationComparatorInterface $comparator = null): DigitalInformationComparatorInterface
    {
        if ($comparator !== null) {
            $this->comparator = new $comparator($this);
        } else {
            if ($this->comparator === null) {
                $this->comparator = new DigitalInformationComparator($this);
            }
        }

        return $this->comparator;
    }

    public function convert(DigitalInformationConverterInterface $converter = null): DigitalInformationConverterInterface
    {
        if ($converter !== null) {
            $this->converter = new $converter($this);
        } else {
            if ($this->converter === null) {
                $this->converter = new DigitalInformationConverter($this);
            }
        }

        return $this->converter;
    }

    public function observer(DigitalInformationObserverManagerInterface $observerManager = null): DigitalInformationObserverManagerInterface
    {
        if ($observerManager !== null) {
            $this->observerManager = new $observerManager($this);
        } else {
            if ($this->observerManager === null) {
                $this->observerManager = new DigitalInformationObserverManager($this);
            }
        }

        return $this->observerManager;
    }

    public function __destruct()
    {
        $this->observer()->notify('destroy');
    }
}
