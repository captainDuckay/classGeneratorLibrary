<?php

declare(strict_types=1);

namespace NonBusinessLogic;

/**
 * Class InterfaceGenerator
 * @package NonBusinessLogic
 */
class ClassGenerator extends GenericClassGenerator
{
    /**
     * InterfaceGenerator constructor.
     * @param string $name
     * @param string $path
     * @param string $namespace
     * @param bool $isStatic
     * @param MethodGenerator[] $methods
     * @param string $extending
     * @param array $implementations
     */
    public function __construct(
        string $name,
        string $path = '/',
        string $namespace = '/',
        bool $isStatic = false,
        array $methods = [],
        string $extending = '',
        array $implementations = []
    ) {
        parent::__construct(
            $name,
            $path,
            $namespace,
            $isStatic,
            $methods,
            $extending,
            $implementations
        );
    }

    /**
     * @inheritDoc
     */
    public function generateFileContent(): string
    {
        $methodsString = function (): string {
            $returnString = '';
            foreach ($this->getMethods() as $method) {
                $returnString .= $method->generateGenericClassString() . PHP_EOL;
            }
            return $returnString;
        };

        return <<<EOD
<?php
declare(strict_types=1);

/**
 * Class {$this->getName()}
{$this->generateNamespacePackage()}
 */
class {$this->getName()} {$this->generateExtendsString()} {$this->generateImplementsString()}
{
	{$methodsString}
}
EOD;
    }
}