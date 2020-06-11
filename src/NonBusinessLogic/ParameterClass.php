<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic;


use classGeneratorLibrary\NonBusinessLogic\Traits\ParameterTrait;

/**
 * Class MethodClass
 * @package NonBusinessLogic
 */
class ParameterClass {

	use ParameterTrait;

	/**
	 * MethodClass constructor.
	 *
	 * @param string $name
	 * @param string $returnTypeName
	 */
	public function __construct(
		string $name,
		string $returnTypeName
	) {

		$this->setName( $name );
		$this->setReturnType( $returnTypeName );
	}

	public function generateParameterString(): string {

		return $this->getConvertedReturnType() . ' ' . $this->getName();

	}

}