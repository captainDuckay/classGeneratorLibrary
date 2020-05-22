<?php

declare(strict_types=1);


namespace NonBusinessLogic;


use NonBusinessLogic\Traits\ExtendsTrait;
use NonBusinessLogic\Traits\ImplementsTrait;
use NonBusinessLogic\Traits\NamespaceTrait;
use NonBusinessLogic\Traits\PathTrait;
use NonBusinessLogic\Traits\ReturnType;
use NonBusinessLogic\Traits\VisibilityTrait;

/**
 * Class GenericClassGenerator
 * @package NonBusinessLogic
 */
abstract class GenericClassGenerator implements ClassGeneratorInterface
{

    use NamespaceTrait;
    use PathTrait;
    use ImplementsTrait;
    use ExtendsTrait;
    use VisibilityTrait;
    use ReturnType;

    /** @var string */
    private string $name;

    /** @var string */
    private string $contents;

    /** @var MethodGenerator[] */
    private array $methods;

    /**
     * @return MethodGenerator[]
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @param MethodGenerator[] $methods
     * @return GenericClassGenerator
     */
    public function setMethods(array $methods): GenericClassGenerator
    {
        $this->methods = $methods;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return GenericClassGenerator
     */
    protected function setName(string $name): GenericClassGenerator
    {
        $this->name = $name;
        return $this;
    }

    /**
     * MethodGenerator constructor.
     * @param string $name
     * @param string $path
     * @param string $namespace
     * @param bool $isStatic
     * @param array $methods
     * @param string $extending
     * @param string[] $implementations
     */
    public function __construct(
        string $name,
        string $path,
        string $namespace,
        bool $isStatic,
        array $methods,
        string $extending,
        array $implementations
    ) {
        $this->setStatic($isStatic);
        $this->setName($name);
        $this->setMethods($methods);
        $this->setNamespace($namespace);
        $this->setPath($path);
        $this->setExtension($extending);
        $this->setImplementations($implementations);
    }

}