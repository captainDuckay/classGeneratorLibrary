<?php
declare(strict_types=1);


namespace NonBusinessLogic\Traits;


/**
 * Trait ImplementsTrait
 * @package NonBusinessLogic
 */
trait ImplementsTrait
{

	/** @var string[] */
	private array $implementations;

	/**
	 * @return string[]
	 */
	public function getImplementations(): array
	{
		return $this->implementations;
	}

	/**
	 * @param string[] $implementations
	 * @return ImplementsTrait
	 */
	public function setImplementations(array $implementations): ImplementsTrait
	{
		$this->implementations = $implementations;
		return $this;
	}

	/**
	 * @return string
	 */
	public function generateImplementsString():string {
		if(count($this->getImplementations()) == 0)
			return '';
		else
			return 'implements ' . join(', ', $this->getImplementations());
	}

}