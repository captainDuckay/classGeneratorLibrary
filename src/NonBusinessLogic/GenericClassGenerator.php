<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic;


use classGeneratorLibrary\NonBusinessLogic\Traits\ExtendsTrait;
use classGeneratorLibrary\NonBusinessLogic\Traits\ImplementsTrait;
use classGeneratorLibrary\NonBusinessLogic\Traits\NamespaceTrait;
use classGeneratorLibrary\NonBusinessLogic\Traits\PathTrait;

/**
 * Class GenericClassGenerator
 * @package NonBusinessLogic
 */
abstract class GenericClassGenerator implements ClassGeneratorInterface {

	use NamespaceTrait;
	use PathTrait;
	use ImplementsTrait;
	use ExtendsTrait;

	/** @var string */
	private string $name;

	/** @var string */
	private string $contents;

	/**
	 * @var PropertyClass[]
	 */
	private array $properties;

	/**
	 * @var MethodClass[]
	 */
	private array $methods;

	/**
	 * @return string
	 */
	public function getContents(): string {

		return $this->contents;
	}

	/**
	 * @param string $contents
	 */
	public function setContents( string $contents ): void {

		$this->contents = $contents;
	}

	/**
	 * @return PropertyClass[]
	 */
	public function getProperties(): array {

		return $this->properties;
	}

	/**
	 * @param PropertyClass[] $properties
	 */
	public function setProperties( array $properties ): void {

		$this->properties = $properties;
	}

	/**
	 * @return MethodClass[]
	 */
	public function getMethods(): array {

		return $this->methods;
	}

	/**
	 * @param MethodClass[] $methods
	 */
	public function setMethods( array $methods ): void {

		$this->methods = $methods;
	}

	/**
	 * @return string
	 */
	public function getName(): string {

		return $this->name;
	}

	/**
	 * @param string $name
	 *
	 * @return GenericClassGenerator
	 */
	protected function setName( string $name ): GenericClassGenerator {

		$this->name = $name;
		return $this;
	}

	/**
	 * MethodClass constructor.
	 *
	 * @param string          $name
	 * @param string          $path
	 * @param string          $namespace
	 * @param MethodClass[]   $methods
	 * @param string          $extending
	 * @param string[]        $implementations
	 * @param PropertyClass[] $properties
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

		$this->setName( $name );
		$this->setMethods( $methods );
		$this->setNamespace( $namespace );
		$this->setPath( $path );
		$this->setExtension( $extending );
		$this->setImplementations( $implementations );
		$this->setProperties( $properties );
	}

	/**
	 * @inheritDoc
	 */
	public function generateMethodString(): string {

		$returnString = '';
		foreach( $this->getMethods() as $method ) {
			$returnString .= $method->generateGenericClassString() . PHP_EOL;
		}
		return $returnString;

	}

	/**
	 * @inheritDoc
	 */
	public function generatePropertyString(): string {

		$returnString = '';
		foreach( $this->getProperties() as $method ) {
			$returnString .= $method->generateGenericPropertyString() . PHP_EOL;
		}
		return $returnString;

	}


}