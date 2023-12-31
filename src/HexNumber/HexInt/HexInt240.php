<?php

namespace Enjin\BlockchainTools\HexNumber\HexInt;

class HexInt240 extends BaseHexInt
{
    public const BIT_SIZE = 240;
    public const HEX_LENGTH = 60;
    public const HEX_MIN = '800000000000000000000000000000000000000000000000000000000000';
    public const HEX_MAX = '7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff';
    public const INT_MIN = '-883423532389192164791648750371459257913741948437809479060803100646309888';
    public const INT_MAX = '883423532389192164791648750371459257913741948437809479060803100646309887';
    public const INT_SIZE = '1766847064778384329583297500742918515827483896875618958121606201292619775';

    public function toHexInt240(): string
    {
        return $this->value;
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
