<?php
declare(strict_types=1);


namespace NonBusinessLogic\Traits;


/**
 * Trait PathTrait
 * @package NonBusinessLogic
 */
trait PathTrait
{

	/** @var string */
	private string $path;

	/**
	 * @return string
	 */
	public function getPath(): string
	{
		return $this->path;
	}

	/**
	 * @param string $path
	 * @return PathTrait
	 */
	public function setPath(string $path): PathTrait
	{
		$this->path = $path;
		return $this;
	}

}