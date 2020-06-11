<?php


namespace classGeneratorLibrary\NonBusinessLogic\Traits;

use classGeneratorLibrary\NonBusinessLogic\ParameterClass;

trait MethodTrait {

	use VisibilityTrait;
	use StaticTrait;
	use ReturnType;
	use ContentsTrait;

	/** @var string */
	private string $name;

	/** @var ParameterClass[] */
	private array $parameters;

	/**
	 * @return ParameterClass[]
	 */
	public function getParameters(): array {

		return $this->parameters;
	}

	/**
	 * @param ParameterClass[] $parameters
	 */
	public function setParameters( array $parameters ): void {

		$this->parameters = $parameters;
	}

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