<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic;

/**
 * Class TraitClass
 * @package NonBusinessLogic
 */
class TraitClass extends GenericClassGenerator {

	/**
	 * TraitClass constructor.
	 *
	 * @inheritDoc
	 */
	public function __construct(
		string $name,
		string $path,
		string $namespace,
		array $methods,
		string $extending,
		array $implementations,
		array $properties
	) {
		parent::__construct(
			$name,
			$path,
			$namespace,
			$methods,
			$extending,
			$implementations,
			$properties
		);
	}

	/**
	 * @inheritDoc
	 */
	public function generateFileContent(): string {

		return <<<EOD
<?php
declare(strict_types=1);

/**
 * Trait {$this->getName()}
{$this->generateNamespacePackage()}
 */
class {$this->getName()} {$this->generateExtendsString()} {$this->generateImplementsString()}
{
	{$this->generatePropertyString()}
	
	{$this->generateMethodString()}
}
EOD;
	}

	/**
	 * @return string
	 */
	public function generateUseString() {

		return "{$this->getNamespace()}\\{$this->getName()}";

	}

}