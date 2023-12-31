<?php

namespace Enjin\BlockchainTools\HexNumber\HexInt;

class HexInt224 extends BaseHexInt
{
    public const BIT_SIZE = 224;
    public const HEX_LENGTH = 56;
    public const HEX_MIN = '80000000000000000000000000000000000000000000000000000000';
    public const HEX_MAX = '7fffffffffffffffffffffffffffffffffffffffffffffffffffffff';
    public const INT_MIN = '-13479973333575319897333507543509815336818572211270286240551805124608';
    public const INT_MAX = '13479973333575319897333507543509815336818572211270286240551805124607';
    public const INT_SIZE = '26959946667150639794667015087019630673637144422540572481103610249215';

    public function toHexInt224(): string
    {
        return $this->value;
    }

    public function toHexInt232(): string
    {
        return $this->convertUpTo(232);
    }

    public function toHexInt240(): string
    {
        return $this->convertUpTo(240);
    }

    public function toHexInt248(): string
    {
        return $this->convertUpTo(248);
    }

    public function toHexInt256(): string
    {
        return $this->convertUpTo(256);
    }
}
