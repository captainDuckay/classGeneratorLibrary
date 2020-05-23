<?php


namespace classGeneratorLibrary\NonBusinessLogic\Traits;


trait StaticTrait
{

	/** @var bool */
	private bool $static;

	/**
	 * @return bool
	 */
	public function isStatic(): bool
	{
		return $this->static;
	}

	/**
	 * @param bool $static
	 */
	public function setStatic(bool $static): void
	{
		$this->static = $static;
	}

	/**
	 * @return string
	 */
	private function generateIsStaticString(): string
	{
		if ($this->isStatic()) {
			return "static";
		} else {
			return '';
		}
	}

}