<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic\Traits;


/**
 * Trait PathTrait
 * @package NonBusinessLogic
 */
trait PathTrait
{

    /** @var string */
    private string $path;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

}