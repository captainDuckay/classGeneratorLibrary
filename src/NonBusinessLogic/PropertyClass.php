<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic;


use classGeneratorLibrary\NonBusinessLogic\Traits\PropertyTrait;

/**
 * Class MethodClass
 * @package NonBusinessLogic
 */
class PropertyClass
{

	use PropertyTrait;

	/**
	 * MethodClass constructor.
	 * @param string $visibilityState
	 * @param string $name
	 * @param string $returnTypeName
	 */
	public function __construct(
		string $visibilityState,
		string $name,
		string $returnTypeName
	) {
		$this->setVisibilityState($visibilityState);
		$this->setName($name);
		$this->setReturnType($returnTypeName);
	}

	/**
	 * @return string
	 */
	public function generateGenericPropertyString(): string
	{
		$ucName = ucfirst($this->getName());

		return <<<string
    private {$this->getConvertedReturnType()} {$this->getName()};

    public function get{$ucName}():{$this->getConvertedReturnType()} {
        return \$this->{$this->getName()};    
    }
    
    public function set{$ucName}():{$this->getConvertedReturnType()} {
        return \$this->{$this->getName()};    
    }
string;


	}

}