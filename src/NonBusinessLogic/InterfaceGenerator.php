<?php
declare(strict_types=1);

namespace NonBusinessLogic;

use NonBusinessLogic\Traits\ExtendsTrait;
use NonBusinessLogic\Traits\ImplementsTrait;
use NonBusinessLogic\Traits\NamespaceTrait;
use NonBusinessLogic\Traits\PathTrait;

/**
 * Class InterfaceGenerator
 * @package NonBusinessLogic
 */
class InterfaceGenerator implements ClassGeneratorInterface
{

	use ExtendsTrait;
	use ImplementsTrait;
	use PathTrait;
	use NamespaceTrait;

	/** @var string */
	private string $name;

	/** @var MethodGenerator[] */
	public array $methods;

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
	public function setName(string $name): void
	{
		$this->name = $name;
	}


	/**
	 * InterfaceGenerator constructor.
	 * @param string $name
	 * @param string $extends
	 * @param array $implements
	 * @param string $path
	 * @param string $namespace
	 */
	public function __construct(string $name, string $extends, array $implements, string $path, string $namespace)
	{
		$this->setName($name);
		$this->setExtension($extends);
		$this->setImplementations($implements);
		$this->setPath($path);
		$this->setNamespace($namespace);
	}


	/**
	 * @inheritDoc
	 */
	public function generateFileContent(): string
	{

		$methodsString = function (): string {
			$returnString = '';
			foreach ($this->methods as $method)
				$returnString .= $method->generateMethodString() . PHP_EOL;
		};

		return <<<EOD
<?php
declare(strict_types=1);

/**
 * Class {$this->getName()}
{$this->generateNamespacePackage()}
 */
class InterfaceGenerator {$this->generateExtendsString()} {$this->generateImplementsString()}
{
	{$methodsString}
}
EOD;

	}
}