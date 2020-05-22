<?php

declare(strict_types=1);

use NonBusinessLogic\InterfaceGenerator;
use NonBusinessLogic\MethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * Class InterfaceGeneratorTest
 */
class InterfaceGeneratorTest extends TestCase
{

    /**
     * @return MethodGenerator[]
     */
    private function generateMethods(): array
    {
        $arrayOfMethods = [];

        $arrayOfMethods[] = new MethodGenerator('public', false, 'publicNonStaticMethod', 'void');
        $arrayOfMethods[] = new MethodGenerator('public', true, 'publicStaticMethod', 'string');
        return $arrayOfMethods;
    }

    public function testGenerateFileContent()
    {
        $interfaceClass = new InterfaceGenerator(
            'testInterface', '/', '/', false, $this->generateMethods(), '', []
        );

        $fileContent = $interfaceClass->generateFileContent();

        $this->assertStringContainsString('declare(strict_types=1);', $fileContent);
        $this->assertStringContainsString(' * Interface testInterface', $fileContent);
        $this->assertStringContainsString('interface testInterface', $fileContent);
        $this->assertStringContainsString('public  function publicNonStaticMethod(): void;', $fileContent);
        $this->assertStringContainsString('public static function publicStaticMethod(): string;', $fileContent);
    }
}
