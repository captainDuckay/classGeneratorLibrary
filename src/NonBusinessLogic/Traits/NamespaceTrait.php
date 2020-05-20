<?php
declare(strict_types=1);


namespace NonBusinessLogic\Traits;


/**
 * Trait NamespaceTrait
 * @package NonBusinessLogic\Traits
 */
trait NamespaceTrait
{
	/** @var string */
	private string $namespace;

	/**
	 * @return string
	 */
	public function getNamespace(): string
	{
		return $this->namespace;
	}

	/**
	 * @param string $namespace
	 * @return NamespaceTrait
	 */
	public function setNamespace(string $namespace): NamespaceTrait
	{
		$this->namespace = $namespace;
		return $this;
	}

	/**
	 * @return string
	 */
	public function generateNamespacePackage(): string
	{
		if ($this->getNamespace() != '')
			return " * @package {$this->getNamespace()}";
		else
			return '';
	}

}