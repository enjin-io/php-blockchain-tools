<?php

namespace Tests\Unit\HexUInt;

use Enjin\BlockchainTools\HexNumber\HexUInt;
use Enjin\BlockchainTools\HexNumber\HexUInt\HexUInt256;
use Tests\TestCase;

class HexUInt256Test extends TestCase
{
    public function testInvalidLength()
    {
        $value = '1234567890abcdef1234567890abcde';
        $value = str_pad($value, 63, 0);
        $expectedMessage = 'HexUInt256 value provided is invalid. Expected 64 characters but has: 63 (input value: 1234567890abcdef1234567890abcde00000000000000000000000000000000)';
        $this->assertInvalidArgumentException($expectedMessage, function () use ($value) {
            HexUInt::fromHexUInt256($value);
        });

        $this->assertInvalidArgumentException($expectedMessage, function () use ($value) {
            new HexUInt256($value);
        });

        $value = '1234567890abcdef1234567890abcdef1';
        $value = str_pad($value, 65, '0');
        $expectedMessage = 'HexUInt256 value provided is invalid. Expected 64 characters but has: 65 (input value: 1234567890abcdef1234567890abcdef100000000000000000000000000000000)';
        $this->assertInvalidArgumentException($expectedMessage, function () use ($value) {
            HexUInt::fromHexUInt256($value);
        });

        $this->assertInvalidArgumentException($expectedMessage, function () use ($value) {
            new HexUInt256($value);
        });
    }

    public function test256To8Top()
    {
        $value = str_pad('ab', 64, '0', STR_PAD_RIGHT);
        $expected = 'ab';

        $actual = HexUInt::fromHexUInt256($value)->toHexUInt8Top();
        $this->assertEquals($expected, $actual);

        $actual = HexUInt::fromHexUInt256('0x' . $value)->toHexUInt8Top();
        $this->assertEquals('0x' . $expected, $actual);

        $actual = (new HexUInt256($value))->toHexUInt8Top();
        $this->assertEquals($expected, $actual);
    }

    public function test256To8Bottom()
    {
        $value = str_pad('ef', 64, '0', STR_PAD_LEFT);
        $expected = 'ef';

        $actual = HexUInt::fromHexUInt256($value)->toHexUInt8Bottom();
        $this->assertEquals($expected, $actual);

        $actual = HexUInt::fromHexUInt256('0x' . $value)->toHexUInt8Bottom();
        $this->assertEquals('0x' . $expected, $actual);

        $actual = (new HexUInt256($value))->toHexUInt8Bottom();
        $this->assertEquals($expected, $actual);
    }

    public function test256To16Top()
    {
        $value = str_pad('1234', 64, '0', STR_PAD_RIGHT);
        $expected = '1234';

        $actual = HexUInt::fromHexUInt256($value)->toHexUInt16Top();
        $this->assertEquals($expected, $actual);

        $actual = HexUInt::fromHexUInt256('0x' . $value)->toHexUInt16Top();
        $this->assertEquals('0x' . $expected, $actual);

        $actual = (new HexUInt256($value))->toHexUInt16Top();
        $this->assertEquals($expected, $actual);
    }

    public function test256To16Bottom()
    {
        $value = str_pad('cdef', 64, '0', STR_PAD_LEFT);
        $expected = 'cdef';

        $actual = HexUInt::fromHexUInt256($value)->toHexUInt16Bottom();
        $this->assertEquals($expected, $actual);

        $actual = HexUInt::fromHexUInt256('0x' . $value)->toHexUInt16Bottom();
        $this->assertEquals('0x' . $expected, $actual);

        $actual = (new HexUInt256($value))->toHexUInt16Bottom();
        $this->assertEquals($expected, $actual);
    }

    public function test256To32Top()
    {
        $value = str_pad('12345678', 64, '0', STR_PAD_RIGHT);
        $expected = '12345678';

        $actual = HexUInt::fromHexUInt256($value)->toHexUInt32Top();
        $this->assertEquals($expected, $actual);

        $actual = HexUInt::fromHexUInt256('0x' . $value)->toHexUInt32Top();
        $this->assertEquals('0x' . $expected, $actual);

        $actual = (new HexUInt256($value))->toHexUInt32Top();
        $this->assertEquals($expected, $actual);
    }

    public function test256To32Bottom()
    {
        $value = str_pad('90abcdef', 64, '0', STR_PAD_LEFT);
        $expected = '90abcdef';

        $actual = HexUInt::fromHexUInt256($value)->toHexUInt32Bottom();
        $this->assertEquals($expected, $actual);

        $actual = HexUInt::fromHexUInt256('0x' . $value)->toHexUInt32Bottom();
        $this->assertEquals('0x' . $expected, $actual);

        $actual = (new HexUInt256($value))->toHexUInt32Bottom();
        $this->assertEquals($expected, $actual);
    }

    public function test256To64Top()
    {
        $value = str_pad('1234567812345678', 64, '0', STR_PAD_RIGHT);
        $expected = '1234567812345678';

        $actual = HexUInt::fromHexUInt256($value)->toHexUInt64Top();
        $this->assertEquals($expected, $actual);

        $actual = HexUInt::fromHexUInt256('0x' . $value)->toHexUInt64Top();
        $this->assertEquals('0x' . $expected, $actual);

        $actual = (new HexUInt256($value))->toHexUInt64Top();
        $this->assertEquals($expected, $actual);
    }

    public function test256To64Bottom()
    {
        $value = str_pad('1234567890abcdef', 64, '0', STR_PAD_LEFT);
        $expected = '1234567890abcdef';

        $actual = HexUInt::fromHexUInt256($value)->toHexUInt64Bottom();
        $this->assertEquals($expected, $actual);

        $actual = HexUInt::fromHexUInt256('0x' . $value)->toHexUInt64Bottom();
        $this->assertEquals('0x' . $expected, $actual);

        $actual = (new HexUInt256($value))->toHexUInt64Bottom();
        $this->assertEquals($expected, $actual);
    }

    public function test256To128Top()
    {
        $value = str_pad('12345678123456781234567812345678', 64, '0', STR_PAD_RIGHT);
        $expected = '12345678123456781234567812345678';

        $actual = HexUInt::fromHexUInt256($value)->toHexUInt128Top();
        $this->assertEquals($expected, $actual);

        $actual = HexUInt::fromHexUInt256('0x' . $value)->toHexUInt128Top();
        $this->assertEquals('0x' . $expected, $actual);

        $actual = (new HexUInt256($value))->toHexUInt128Top();
        $this->assertEquals($expected, $actual);
    }

    public function test256To128Bottom()
    {
        $value = str_pad('1234567890abcdef1234567890abcdef', 64, '0', STR_PAD_LEFT);
        $expected = '1234567890abcdef1234567890abcdef';

        $actual = HexUInt::fromHexUInt256($value)->toHexUInt128Bottom();
        $this->assertEquals($expected, $actual);

        $actual = HexUInt::fromHexUInt256('0x' . $value)->toHexUInt128Bottom();
        $this->assertEquals('0x' . $expected, $actual);

        $actual = (new HexUInt256($value))->toHexUInt128Bottom();
        $this->assertEquals($expected, $actual);
    }

    public function testToDecimal()
    {
        $value = 'aaaaaaaabbbbbbbbaaaaaaaabbbbbbbbaaaaaaaabbbbbbbbaaaaaaaabbbbbbbb';
        $expected = '77194726160008126726438892543174727632858287230546472862184185541434611055547';

        $actual = HexUInt::fromHexUInt256($value)->toDecimal();
        $this->assertEquals($expected, $actual);

        $actual = (new HexUInt256($value))->toDecimal();
        $this->assertEquals($expected, $actual);
    }

    public function testPadLeft()
    {
        $value = '1234567890abcdef1234567890abcdef';
        $expected = str_pad('1234567890abcdef1234567890abcdef', 64, '0', STR_PAD_LEFT);

        $actual = HexUInt256::padLeft($value);
        $this->assertEquals($expected, $actual);
    }

    public function testPadRight()
    {
        $value = '1234567890abcdef1234567890abcdef';
        $expected = str_pad('1234567890abcdef1234567890abcdef', 64, '0', STR_PAD_RIGHT);

        $actual = HexUInt256::padRight($value);
        $this->assertEquals($expected, $actual);
    }

    public function testTop()
    {
        $a = str_repeat('a', 16);
        $b = str_repeat('b', 48);

        $value = $a . $b;

        $actual = HexUInt256::fromHex($value)->top(16);
        $this->assertEquals($a, $actual);
    }

    public function testTopInvalid()
    {
        $message = 'Cannot take 65 characters from top of string with length: 64';
        $this->assertInvalidArgumentException($message, function () {
            $value = str_repeat('0', 64);
            HexUInt256::fromHex($value)->top(65);
        });
    }

    public function testBottom()
    {
        $a = str_repeat('a', 48);
        $b = str_repeat('b', 16);

        $value = $a . $b;

        $actual = HexUInt256::fromHex($value)->bottom(16);
        $this->assertEquals($b, $actual);
    }

    public function testBottomInvalid()
    {
        $message = 'Cannot take 65 characters from bottom of string with length: 64';
        $this->assertInvalidArgumentException($message, function () {
            $value = str_repeat('0', 64);
            HexUInt256::fromHex($value)->bottom(65);
        });
    }
}
