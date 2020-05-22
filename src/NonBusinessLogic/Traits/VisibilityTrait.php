<?php

declare(strict_types=1);


namespace NonBusinessLogic\Traits;


/**
 * Trait VisibilityTrait
 * @package NonBusinessLogic\Traits
 */
trait VisibilityTrait
{

    /**
     * @var string[]
     */
    private array $allowedVisibilityStates = [
        'public',
        'private',
        'protected'
    ];

    /** @var string */
    private string $visibilityState;

    /** @var bool */
    private bool $static;

    /**
     * @return bool
     */
    public function isStatic(): bool
    {
        return $this->static;
    }

    /**
     * @param bool $static
     */
    public function setStatic(bool $static): void
    {
        $this->static = $static;
    }

    /**
     * @return string
     */
    public function getVisibilityState(): string
    {
        return $this->visibilityState;
    }

    /**
     * @param string $visibilityState
     */
    public function setVisibilityState(string $visibilityState): void
    {
        if (!in_array($visibilityState, $this->allowedVisibilityStates)) {
            throw new \InvalidArgumentException();
        } else {
            $this->visibilityState = $visibilityState;
        }
    }

    /**
     * @return string
     */
    private function generateIsStaticString(): string
    {
        if ($this->isStatic()) {
            return "static";
        } else {
            return '';
        }
    }

}