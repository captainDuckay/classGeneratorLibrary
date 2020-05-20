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
	 * @return VisibilityTrait
	 */
	public function setStatic(bool $static): VisibilityTrait
	{
		$this->static = $static;
		return $this;
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
	 * @return VisibilityTrait
	 */
	public function setVisibilityState(string $visibilityState): VisibilityTrait
	{
		if (!in_array($visibilityState, $this->allowedVisibilityStates)) {
			throw new \InvalidArgumentException();
		} else {
			$this->visibilityState = $visibilityState;
			return $this;
		}

	}


}