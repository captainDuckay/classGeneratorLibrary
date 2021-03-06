<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic;


use classGeneratorLibrary\NonBusinessLogic\Traits\MethodTrait;

/**
 * Class MethodClass
 * @package NonBusinessLogic
 */
class MethodClass {

	use MethodTrait;

	/**
	 * MethodClass constructor.
	 *
	 * @param string           $visibilityState
	 * @param bool             $isStatic
	 * @param string           $name
	 * @param string           $content
	 * @param string           $returnTypeName
	 * @param ParameterClass[] $parameters
	 */
	public function __construct(
		string $visibilityState,
		bool $isStatic,
		string $name,
		string $returnTypeName,
		string $content,
		array $parameters
	) {

		$this->setVisibilityState( $visibilityState );
		$this->setStatic( $isStatic );
		$this->setName( $name );
		$this->setReturnType( $returnTypeName );
		$this->setContents( $content );
		$this->setParameters( $parameters );
	}

	/**
	 * @return string
	 */
	public function generateGenericClassString(): string {

		return <<<EOD
{$this->generateInterfaceString()}{

	{$this->getContents()}

}
EOD;
	}

	/**
	 * @return string
	 */
	public function generateInterfaceString(): string {

		return <<<EOD
{$this->getVisibilityState()} {$this->generateIsStaticString()} function {$this->getName(
		)}(){$this->generateReturnTypeString()}
EOD;
	}
}