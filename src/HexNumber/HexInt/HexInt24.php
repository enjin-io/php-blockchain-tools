<?php

namespace Enjin\BlockchainTools\HexNumber\HexInt;

class HexInt24 extends BaseHexInt
{
    public const BIT_SIZE = 24;
    public const HEX_LENGTH = 6;
    public const HEX_MIN = '800000';
    public const HEX_MAX = '7fffff';
    public const INT_MIN = '-8388608';
    public const INT_MAX = '8388607';
    public const INT_SIZE = '16777215';

    public function toHexInt24(): string
    {
        return $this->value;
    }

    public function toHexInt32(): string
    {
        return $this->convertUpTo($this->value, HexInt32::HEX_LENGTH);
    }

    public function toHexInt40(): string
    {
        return $this->convertUpTo($this->value, HexInt40::HEX_LENGTH);
    }

    public function toHexInt48(): string
    {
        return $this->convertUpTo($this->value, HexInt48::HEX_LENGTH);
    }

    public function toHexInt56(): string
    {
        return $this->convertUpTo($this->value, HexInt56::HEX_LENGTH);
    }

    public function toHexInt64(): string
    {
        return $this->convertUpTo($this->value, HexInt64::HEX_LENGTH);
    }

    public function toHexInt72(): string
    {
        return $this->convertUpTo($this->value, HexInt72::HEX_LENGTH);
    }

    public function toHexInt80(): string
    {
        return $this->convertUpTo($this->value, HexInt80::HEX_LENGTH);
    }

    public function toHexInt88(): string
    {
        return $this->convertUpTo($this->value, HexInt88::HEX_LENGTH);
    }

    public function toHexInt96(): string
    {
        return $this->convertUpTo($this->value, HexInt96::HEX_LENGTH);
    }

    public function toHexInt104(): string
    {
        return $this->convertUpTo($this->value, HexInt104::HEX_LENGTH);
    }

    public function toHexInt112(): string
    {
        return $this->convertUpTo($this->value, HexInt112::HEX_LENGTH);
    }

    public function toHexInt120(): string
    {
        return $this->convertUpTo($this->value, HexInt120::HEX_LENGTH);
    }

    public function toHexInt128(): string
    {
        return $this->convertUpTo($this->value, HexInt128::HEX_LENGTH);
    }

    public function toHexInt136(): string
    {
        return $this->convertUpTo($this->value, HexInt136::HEX_LENGTH);
    }

    public function toHexInt144(): string
    {
        return $this->convertUpTo($this->value, HexInt144::HEX_LENGTH);
    }

    public function toHexInt152(): string
    {
        return $this->convertUpTo($this->value, HexInt152::HEX_LENGTH);
    }

    public function toHexInt160(): string
    {
        return $this->convertUpTo($this->value, HexInt160::HEX_LENGTH);
    }

    public function toHexInt168(): string
    {
        return $this->convertUpTo($this->value, HexInt168::HEX_LENGTH);
    }

    public function toHexInt176(): string
    {
        return $this->convertUpTo($this->value, HexInt176::HEX_LENGTH);
    }

    public function toHexInt184(): string
    {
        return $this->convertUpTo($this->value, HexInt184::HEX_LENGTH);
    }

    public function toHexInt192(): string
    {
        return $this->convertUpTo($this->value, HexInt192::HEX_LENGTH);
    }

    public function toHexInt200(): string
    {
        return $this->convertUpTo($this->value, HexInt200::HEX_LENGTH);
    }

    public function toHexInt208(): string
    {
        return $this->convertUpTo($this->value, HexInt208::HEX_LENGTH);
    }

    public function toHexInt216(): string
    {
        return $this->convertUpTo($this->value, HexInt216::HEX_LENGTH);
    }

    public function toHexInt224(): string
    {
        return $this->convertUpTo($this->value, HexInt224::HEX_LENGTH);
    }

    public function toHexInt232(): string
    {
        return $this->convertUpTo($this->value, HexInt232::HEX_LENGTH);
    }

    public function toHexInt240(): string
    {
        return $this->convertUpTo($this->value, HexInt240::HEX_LENGTH);
    }

    public function toHexInt248(): string
    {
        return $this->convertUpTo($this->value, HexInt248::HEX_LENGTH);
    }

    public function toHexInt256(): string
    {
        return $this->convertUpTo($this->value, HexInt256::HEX_LENGTH);
    }
}
