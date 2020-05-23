<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic\Traits;


/**
 * Trait ReturnType
 * @package NonBusinessLogic\Traits
 */
trait ReturnType
{

    /** @var string */
    private string $returnType;

    /**
     * @return string
     */
    public function getReturnType(): string
    {
        return $this->returnType;
    }

    /**
     * @param string $returnType
     */
    public function setReturnType(string $returnType): void
    {
        $this->returnType = $returnType;
    }

    /**
     * @return string
     */
    private function generateReturnTypeString(): string
    {
        if ($this->getReturnType() == '') {
            return '';
        } else {
            return ": {$this->getReturnType()}";
        }
    }
}