<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic\Traits;


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

}