<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic\Traits;

/**
 * Trait ContentsTrait
 * @package NonBusinessLogic\Traits
 */
trait ContentsTrait
{

    /** @var string */
    private string $contents;

    /**
     * @return string
     */
    public function getContents(): string
    {
        return $this->contents;
    }

    /**
     * @param string $contents
     */
    public function setContents(string $contents): void
    {
        $this->contents = $contents;
    }

}