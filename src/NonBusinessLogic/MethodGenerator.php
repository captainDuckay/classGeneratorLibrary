<?php

declare(strict_types=1);


namespace NonBusinessLogic;


use NonBusinessLogic\Traits\ContentsTrait;
use NonBusinessLogic\Traits\ReturnType;
use NonBusinessLogic\Traits\VisibilityTrait;

/**
 * Class MethodGenerator
 * @package NonBusinessLogic
 */
class MethodGenerator
{

    use VisibilityTrait;
    use ReturnType;
    use ContentsTrait;

    /** @var string */
    private string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return MethodGenerator
     */
    protected function setName(string $name): MethodGenerator
    {
        $this->name = $name;
        return $this;
    }

    /**
     * MethodGenerator constructor.
     * @param string $visibilityState
     * @param bool $isStatic
     * @param string $name
     * @param string $content
     * @param string $returnTypeName
     */
    public function __construct(
        string $visibilityState,
        bool $isStatic,
        string $name,
        string $returnTypeName,
        string $content = ''
    ) {
        $this->setVisibilityState($visibilityState);
        $this->setStatic($isStatic);
        $this->setName($name);
        $this->setReturnType($returnTypeName);
        $this->setContents($content);
    }

    /**
     * @return string
     */
    public function generateGenericClassString(): string
    {
        return <<<EOD
{$this->generateInterfaceString()}{

	{$this->getContents()}

}
EOD;
    }

    /**
     * @return string
     */
    public function generateInterfaceString(): string
    {
        return <<<EOD
{$this->getVisibilityState()} {$this->generateIsStaticString()} function {$this->getName(
        )}(){$this->generateReturnTypeString()}
EOD;
    }
}