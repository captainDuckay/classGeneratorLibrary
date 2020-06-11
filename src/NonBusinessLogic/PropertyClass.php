<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic;


use classGeneratorLibrary\NonBusinessLogic\Traits\PropertyTrait;

/**
 * Class MethodClass
 * @package NonBusinessLogic
 */
class PropertyClass
{

	use PropertyTrait;

	/**
	 * MethodClass constructor.
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