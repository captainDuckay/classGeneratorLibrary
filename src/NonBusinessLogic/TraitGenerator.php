<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic;

/**
 * Class TraitGenerator
 * @package NonBusinessLogic
 */
class TraitGenerator extends GenericClassGenerator
{

	/**
	 * TraitGenerator constructor.
	 * @param string $name
	 * @param string $path
	 * @param string $namespace
	 * @param MethodGenerator[] $methods
	 */
	public function __construct(
		string $name,
		string $path = '/',
		string $namespace = '/',
		array $methods = []
	) {
		parent::__construct(
			$name,
			$path,
			$namespace,
			$methods,
			'',
			[]
		);
	}

	/**
	 * @inheritDoc
	 */
	public function generateFileContent(): string
	{
		$methodsString = function (): string {
			$returnString = '';
			foreach ($this->getMethods() as $method) {
				$returnString .= $method->generateGenericClassString() . PHP_EOL;
			}
			return $returnString;
		};

		return <<<EOD
<?php
declare(strict_types=1);

/**
 * Trait {$this->getName()}
{$this->generateNamespacePackage()}
 */
class {$this->getName()} {$this->generateExtendsString()} {$this->generateImplementsString()}
{
	{$methodsString}
}
EOD;
	}
}