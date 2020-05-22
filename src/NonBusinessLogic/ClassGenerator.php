<?php

declare(strict_types=1);

namespace NonBusinessLogic;

use NonBusinessLogic\Traits\AbstractTrait;

/**
 * Class InterfaceGenerator
 * @package NonBusinessLogic
 */
class ClassGenerator extends GenericClassGenerator
{
    use AbstractTrait;

    /**
     * InterfaceGenerator constructor.
     * @param string $name
     * @param string $path
     * @param string $namespace
     * @param bool $isStatic
     * @param MethodGenerator[] $methods
     * @param string $extending
     * @param array $implementations
     * @param bool $isAbstract
     */
    public function __construct(
        string $name,
        string $path = '/',
        string $namespace = '/',
        bool $isStatic = false,
        array $methods = [],
        string $extending = '',
        array $implementations = [],
        bool $isAbstract = false
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

        $this->setAbstract($isAbstract);
    }

    /**
     * @inheritDoc
     */
    public function generateFileContent(): string
    {
        $that =& $this;
        $methodsString = (function () use ($that): string {
            $string = '';
            foreach ($that->getMethods() as $method) {
                $string .= $method->generateGenericClassString() . PHP_EOL;
            }
            return $string;
        })();

        return <<<EOD
<?php
declare(strict_types=1);

/**
 * Class {$this->getName()}
{$this->generateNamespacePackage()}
 */
{$this->generateAbstractString()} class {$this->getName()} {$this->generateExtendsString()} {$this->generateImplementsString()}
{
	{$methodsString}
}
EOD;
    }
}