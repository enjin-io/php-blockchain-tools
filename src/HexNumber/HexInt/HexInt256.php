<?php

namespace Enjin\BlockchainTools\HexNumber\HexInt;

class HexInt256 extends BaseHexInt
{
    public const BIT_SIZE = 256;
    public const HEX_LENGTH = 64;
    public const HEX_MIN = '8000000000000000000000000000000000000000000000000000000000000000';
    public const HEX_MAX = '7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff';
    public const INT_MIN = '-57896044618658097711785492504343953926634992332820282019728792003956564819968';
    public const INT_MAX = '57896044618658097711785492504343953926634992332820282019728792003956564819967';
    public const INT_SIZE = '115792089237316195423570985008687907853269984665640564039457584007913129639935';

    public function toHexInt256(): string
    {
        return $this->value;
    }
}
