<?php

declare(strict_types=1);

namespace classGeneratorLibrary\NonBusinessLogic;

/**
 * Class InterfaceGenerator
 * @package NonBusinessLogic
 */
class InterfaceGenerator extends GenericClassGenerator
{
	/**
	 * InterfaceGenerator constructor.
	 * @param string        $name
	 * @param string        $path
	 * @param string        $namespace
	 * @param MethodClass[] $methods
	 * @param string        $extending
	 * @param array         $implementations
	 */
	public function __construct(
		string $name,
		string $path = '/',
		string $namespace = '/',
		array $methods = [],
		string $extending = '',
		array $implementations = []
	) {
		parent::__construct(
			$name,
			$path,
			$namespace,
			$methods,
			$extending,
			$implementations
		);
	}

	/**
	 * @inheritDoc
	 */
	public function generateFileContent(): string
	{
		$that =& $this;
		$methodsString = (function () use ($that): string {
			$string = '';
			foreach ($that->getMethods() as $method) {
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