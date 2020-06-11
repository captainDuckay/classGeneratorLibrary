<?php


namespace classGeneratorLibrary\NonBusinessLogic\Traits;

trait MethodTrait {

	use VisibilityTrait;
	use StaticTrait;
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
	 * @return MethodTrait
	 */
	protected function setName(string $name): MethodTrait
	{
		$this->name = $name;
		return $this;
	}


}