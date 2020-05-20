<?php
declare(strict_types=1);


namespace NonBusinessLogic\Traits;


/**
 * Trait ReturnType
 * @package NonBusinessLogic\Traits
 */
trait ReturnType
{

	/** @var string */
	private string $returnType;

	/**
	 * @return string
	 */
	public function getReturnType(): string
	{
		return $this->returnType;
	}

	/**
	 * @param string $returnType
	 * @return ReturnType
	 */
	public function setReturnType(string $returnType): ReturnType
	{
		$this->returnType = $returnType;
		return $this;
	}

	/**
	 * @return string
	 */
	private function generateReturnTypeString(): string
	{
		if ($this->getReturnType() == '')
			return '';
		else
			return ": {$this->getReturnType()}";
	}
}