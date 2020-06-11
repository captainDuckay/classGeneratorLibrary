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
	 */
	protected function setName(string $name): void
	{
		$this->name = $name;
	}

}