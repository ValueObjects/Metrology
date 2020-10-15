<?php

namespace ValueObjects\Metrology\UnitTypes\DigitalInformation;

use ValueObjects\Metrology\Contracts\UnitTypes\DigitalInformation\BitInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\DigitalInformation\ByteInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\DigitalInformation\DigitalInformationInterface;
use ValueObjects\Metrology\Contracts\UnitTypes\DigitalInformation\DigitalInformationConverterInterface;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Bit\Bit;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Bit\Kilobit;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Bit\Megabit;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Bit\Gigabit;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Bit\Terabit;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Bit\Petabit;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Bit\Exabit;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Bit\Yottabit;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Bit\Zettabit;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Byte\Byte;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Byte\Kilobyte;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Byte\Megabyte;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Byte\Gigabyte;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Byte\Terabyte;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Byte\Petabyte;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Byte\Exabyte;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Byte\Yottabyte;
use ValueObjects\Metrology\UnitTypes\DigitalInformation\Byte\Zettabyte;

class DigitalInformationConverter implements DigitalInformationConverterInterface
{
    protected DigitalInformationInterface $from;

    public function __construct(DigitalInformationInterface $from)
    {
        $this->from = $from;
    }

    private static function convert(DigitalInformationInterface $from, string $to): float
    {
        $value = $from->getValue();
        if ($from instanceof BitInterface && is_subclass_of($to, ByteInterface::class)) {
            $value /= 8;
        } else {
            if ($from instanceof ByteInterface && is_subclass_of($to, BitInterface::class)) {
                $value *= 8;
            }
        }

        return $value / pow(2, $to::EXPONENT - $from::EXPONENT);
    }

    public function convertTo(DigitalInformationInterface $unit): DigitalInformationInterface
    {
        return $this::{'to' . $unit::getValueObjectName()}();
    }

    public function toBit(): Bit
    {
        if ($this->from instanceof Bit) {
            return new Bit($this->from->getValue());
        }

        return new Bit($this::convert($this->from, Bit::class));
    }

    public function toKilobit(): Kilobit
    {
        if ($this->from instanceof Kilobit) {
            return new Kilobit($this->from->getValue());
        }

        return new Kilobit($this::convert($this->from, Kilobit::class));
    }

    public function toMegabit(): Megabit
    {
        if ($this->from instanceof Megabit) {
            return new Megabit($this->from->getValue());
        }

        return new Megabit($this::convert($this->from, Megabit::class));
    }

    public function toGigabit(): Gigabit
    {
        if ($this->from instanceof Gigabit) {
            return new Gigabit($this->from->getValue());
        }

        return new Gigabit($this::convert($this->from, Gigabit::class));
    }

    public function toTerabit(): Terabit
    {
        if ($this->from instanceof Terabit) {
            return new Terabit($this->from->getValue());
        }

        return new Terabit($this::convert($this->from, Terabit::class));
    }

    public function toPetabit(): Petabit
    {
        if ($this->from instanceof Petabit) {
            return new Petabit($this->from->getValue());
        }

        return new Petabit($this::convert($this->from, Petabit::class));
    }

    public function toExabit(): Exabit
    {
        if ($this->from instanceof Exabit) {
            return new Exabit($this->from->getValue());
        }

        return new Exabit($this::convert($this->from, Exabit::class));
    }

    public function toZettabit(): Zettabit
    {
        if ($this->from instanceof Zettabit) {
            return new Zettabit($this->from->getValue());
        }

        return new Zettabit($this::convert($this->from, Zettabit::class));
    }

    public function toYottabit(): Yottabit
    {
        if ($this->from instanceof Yottabit) {
            return new Yottabit($this->from->getValue());
        }

        return new Yottabit($this::convert($this->from, Yottabit::class));
    }

    public function toByte(): Byte
    {
        if ($this->from instanceof Byte) {
            return new Byte($this->from->getValue());
        }

        return new Byte($this::convert($this->from, Byte::class));
    }

    public function toKilobyte(): Kilobyte
    {
        if ($this->from instanceof Kilobyte) {
            return new Kilobyte($this->from->getValue());
        }

        return new Kilobyte($this::convert($this->from, Kilobyte::class));
    }

    public function toMegabyte(): Megabyte
    {
        if ($this->from instanceof Megabyte) {
            return new Megabyte($this->from->getValue());
        }

        return new Megabyte($this::convert($this->from, Megabyte::class));
    }

    public function toTerabyte(): Terabyte
    {
        if ($this->from instanceof Terabyte) {
            return new Terabyte($this->from->getValue());
        }

        return new Terabyte($this::convert($this->from, Terabyte::class));
    }

    public function toGigabyte(): Gigabyte
    {
        if ($this->from instanceof Gigabyte) {
            return new Gigabyte($this->from->getValue());
        }

        return new Gigabyte($this::convert($this->from, Gigabyte::class));
    }

    public function toPetabyte(): Petabyte
    {
        if ($this->from instanceof Petabyte) {
            return new Petabyte($this->from->getValue());
        }

        return new Petabyte($this::convert($this->from, Petabyte::class));
    }

    public function toExabyte(): Exabyte
    {
        if ($this->from instanceof Exabyte) {
            return new Exabyte($this->from->getValue());
        }

        return new Exabyte($this::convert($this->from, Exabyte::class));
    }

    public function toZettabyte(): Zettabyte
    {
        if ($this->from instanceof Zettabyte) {
            return new Zettabyte($this->from->getValue());
        }

        return new Zettabyte($this::convert($this->from, Zettabyte::class));
    }

    public function toYottabyte(): Yottabyte
    {
        if ($this->from instanceof Yottabyte) {
            return new Yottabyte($this->from->getValue());
        }

        return new Yottabyte($this::convert($this->from, Yottabyte::class));
    }
}
