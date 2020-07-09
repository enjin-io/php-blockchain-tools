<?php

namespace Enjin\BlockchainTools\Generators;

use Enjin\BlockchainTools\Generators\Concerns\HelpsGenerateFiles;
use Enjin\BlockchainTools\HexConverter;
use Enjin\BlockchainTools\HexInt\BaseHexInt;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use Nette\PhpGenerator\Type;

class IntGenerator
{
    use HelpsGenerateFiles;

    public function generate()
    {
        $sizes = $this->getIntLengths();

        $namespaceString = 'Enjin\BlockchainTools\HexInt';

        foreach ($sizes as $size) {
            $result = $this->makeHexIntSizeClass($size, $namespaceString, $sizes);

            $className = $result['className'];
            $contents = $result['contents'];

            $destDir = __DIR__ . '/../../src/HexInt/';
            $this->writePHPFile($destDir, $className, $contents);
        }

        $result = $this->makeHexIntConverterClass($sizes, 'Enjin\BlockchainTools');

        $className = $result['className'];
        $contents = $result['contents'];

        $destDir = __DIR__ . '/../../src/';
        $this->writePHPFile($destDir, $className, $contents);
    }

    public function makeHexIntSizeClass(
        int $size,
        string $namespaceString,
        array $sizes
    ) {
        $namespace = new PhpNamespace($namespaceString);

        $className = 'HexInt' . $size;
        $class = $namespace->addClass($className);

        $class->setExtends(BaseHexInt::class);

        $length = $size / 4;
        $class->addConstant('LENGTH', $length)->setPublic();

        $a = bcpow(2, $size);
        $b = bcdiv($a, 2);
        $intMin = bcmul($b, -1);
        $intMax = bcsub($b, 1);

        $hexMin = HexConverter::intToHexInt($intMin, $length);
        $hexMax = HexConverter::intToHexInt($intMax, $length);

        $class->addConstant('HEX_MIN', $hexMin)->setPublic();
        $class->addConstant('HEX_MAX', $hexMax)->setPublic();

        $class->addConstant('INT_MIN', $intMin)->setPublic();
        $class->addConstant('INT_MAX', $intMax)->setPublic();


        $intSize = bcsub($intMax, $intMin);
        $class->addConstant('SIZE', $intSize)->setPublic();

        foreach ($sizes as $targetSize) {
            $targetClassName = 'HexInt' . $targetSize;

            if ($targetSize < $size) {
            } elseif ($size < $targetSize) {
                $class->addMethod('toInt' . $targetSize)
                    ->setReturnType(Type::STRING)
                    ->addBody('return $this->convertUpTo($this->value, ' . $targetClassName . '::LENGTH);');
            }
        }
        $printer = new PsrPrinter;


        return [
            'className' => $class->getName(),
            'contents' => $printer->printNamespace($namespace),
        ];
    }

    public function makeHexIntConverterClass(array $sizes, string $namespaceString)
    {
        $namespace = new PhpNamespace($namespaceString);

        $class = $namespace->addClass('HexInt');

        foreach ($sizes as $size) {
            $targetClassName = 'HexInt' . $size;
            $targetClass = $namespaceString . '\\HexInt\\' . $targetClassName;

            $namespace->addUse($targetClass);

            $paramName = 'Int' . $size;
            $method = $class->addMethod('fromInt' . $size)
                ->setStatic()
                ->setBody('return new ' . $targetClassName . '($' . $paramName . ');')
                ->setReturnType($targetClass);

            $method->addParameter($paramName)
                ->setType(Type::STRING);
        }

        $printer = new PsrPrinter;

        return [
            'className' => $class->getName(),
            'contents' => $printer->printNamespace($namespace),
        ];
    }
}
