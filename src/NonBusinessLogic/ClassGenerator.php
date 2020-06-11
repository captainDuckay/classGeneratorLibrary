<?php

declare(strict_types=1);

namespace classGeneratorLibrary\NonBusinessLogic;

use classGeneratorLibrary\NonBusinessLogic\Traits\AbstractTrait;

/**
 * Class InterfaceGenerator
 * @package NonBusinessLogic
 */
class ClassGenerator extends GenericClassGenerator {

	use AbstractTrait;

	/**
	 * ClassGenerator constructor.
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
		array $properties,
		bool $isAbstract,
		array $uses
	) {

		parent::__construct(
			$name,
			$path,
			$namespace,
			$methods,
			$extending,
			$implementations,
			$properties,
			$uses
		);
		$this->setAbstract( $isAbstract );
	}

	/**
	 * @inheritDoc
	 */
	public function generateFileContent(): string {

		return <<<EOD
<?php
declare(strict_types=1);

{$this->generateNamespaceString()}

/**
 * Class {$this->getName()}
{$this->generateNamespacePackage()}
 */
{$this->generateAbstractString()} class {$this->getName()} {$this->generateExtendsString(
		)} {$this->generateImplementsString()}
{
	{$this->generateUsesString()}
	
	{$this->generatePropertiesString()}
	
	{$this->generateMethodsString()}
}
EOD;
	}

}