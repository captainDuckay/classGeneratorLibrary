<?php


namespace classGeneratorLibrary\NonBusinessLogic\Traits;

trait PropertyTrait {

	use VisibilityTrait;
	use ReturnType;

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
	 * @return PropertyTrait
	 */
	protected function setName(string $name): PropertyTrait
	{
		$this->name = $name;
		return $this;
	}

}