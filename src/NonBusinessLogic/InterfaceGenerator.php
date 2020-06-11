<?php

declare(strict_types=1);

namespace classGeneratorLibrary\NonBusinessLogic;

/**
 * Class InterfaceGenerator
 * @package NonBusinessLogic
 */
class InterfaceGenerator extends GenericClassGenerator {

	/**
	 * InterfaceGenerator constructor.
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
	}

	/**
	 * @inheritDoc
	 */
	public function generateFileContent(): string {

		$that =& $this;
		$methodsString = (function() use ( $that ): string {

			$string = '';
			foreach( $that->getMethods() as $method ) {
				$string .= $method->generateInterfaceString() . ';' . PHP_EOL;
			}
			return $string;
		})();

		return <<<EOD
<?php
declare(strict_types=1);

/**
 * Interface {$this->getName()}
{$this->generateNamespacePackage()}
 */
interface {$this->getName()} {$this->generateExtendsString()} {$this->generateImplementsString()}
{
	{$methodsString}
}
EOD;
	}
}