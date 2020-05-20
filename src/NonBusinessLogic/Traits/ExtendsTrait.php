<?php
declare(strict_types=1);


namespace NonBusinessLogic\Traits;


/**
 * Trait ExtendsTrait
 * @package NonBusinessLogic
 */
trait ExtendsTrait
{

	/** @var string */
	private string $extension;

	/**
	 * @return string
	 */
	public function getExtension(): string
	{
		return $this->extension;
	}

	/**
	 * @param string $extension
	 * @return ExtendsTrait
	 */
	public function setExtension(string $extension): ExtendsTrait
	{
		$this->extension = $extension;
		return $this;
	}

	/**
	 * @return string
	 */
	public function generateExtendsString(): string
	{

		if ($this->getExtension() == '')
			return '';
		else
			return "extends {$this->getExtension()}";

	}

}