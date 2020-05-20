<?php
declare(strict_types=1);


namespace NonBusinessLogic;


use NonBusinessLogic\Traits\ReturnType;
use NonBusinessLogic\Traits\VisibilityTrait;

/**
 * Class MethodGenerator
 * @package NonBusinessLogic
 */
class MethodGenerator
{

	use VisibilityTrait;
	use ReturnType;

	/** @var string */
	private string $name;

	/** @var string */
	private string $contents;

	/**
	 * @return string
	 */
	public function getContents(): string
	{
		return $this->contents;
	}

	/**
	 * @param string $contents
	 * @return MethodGenerator
	 */
	public function setContents(string $contents): MethodGenerator
	{
		$this->contents = $contents;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return MethodGenerator
	 */
	protected function setName(string $name): MethodGenerator
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * MethodGenerator constructor.
	 * @param string $visibilityState
	 * @param bool $isStatic
	 * @param string $name
	 * @param string $content
	 * @param string $returnTypeName
	 */
	public function __construct(string $visibilityState, bool $isStatic, string $name, string $returnTypeName, string $content = '')
	{
		$this->setVisibilityState($visibilityState);
		$this->setStatic($isStatic);
		$this->setName($name);
		$this->setReturnType($returnTypeName);
		$this->setContents($content);
	}

	/**
	 * @return string
	 */
	public function generateMethodString(): string
	{
		return <<<EOD
{$this->getVisibilityState()} function {$this->getName()}(){$this->generateReturnTypeString()}{

	{$this->getContents()}

}
EOD;

	}

}