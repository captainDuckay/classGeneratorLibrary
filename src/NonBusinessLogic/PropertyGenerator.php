<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic;


use classGeneratorLibrary\NonBusinessLogic\Traits\ReturnType;
use classGeneratorLibrary\NonBusinessLogic\Traits\VisibilityTrait;

/**
 * Class MethodGenerator
 * @package NonBusinessLogic
 */
class PropertyGenerator
{

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
	 * @return PropertyGenerator
	 */
	protected function setName(string $name): PropertyGenerator
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * MethodGenerator constructor.
	 * @param string $visibilityState
	 * @param string $name
	 * @param string $returnTypeName
	 */
	public function __construct(
		string $visibilityState,
		string $name,
		string $returnTypeName
	) {
		$this->setVisibilityState($visibilityState);
		$this->setName($name);
		$this->setReturnType($returnTypeName);
	}

	/**
	 * @return string
	 */
	public function generateGenericPropertyString(): string
	{
		return <<<EOD
	{$this->getVisibilityState()} {$this->getReturnType()} {$this->getName()};
EOD;
	}

}