<?php

namespace NonBusinessLogic;

use PHPUnit\Framework\TestCase;

class ClassGeneratorTest extends TestCase
{

    /**
     * @return MethodGenerator[]
     */
    private function generateMethods(): array
    {
        $arrayOfMethods = [];

        $arrayOfMethods[] = new MethodGenerator('public', false, 'publicNonStaticMethod', 'void', '$public = 10;\\n$public+1;die($public);');

        $arrayOfMethods[] = new MethodGenerator('public', true, 'publicStaticMethod', 'string');
        return $arrayOfMethods;
    }

    public function testGenerateFileContent()
    {
        $classGenerator = new ClassGenerator(
            'testClass', '/', '/', false, $this->generateMethods(), '', [], true
        );

        $fileContent = $classGenerator->generateFileContent();

        $this->assertStringContainsString('declare(strict_types=1);', $fileContent);
        $this->assertStringContainsString(' * Class testClass', $fileContent);
        $this->assertStringContainsString('abstract class testClass', $fileContent);
        $this->assertStringContainsString('public  function publicNonStaticMethod(): void{', $fileContent);
        $this->assertStringContainsString('public static function publicStaticMethod(): string{', $fileContent);

        echo $fileContent;

    }
}
