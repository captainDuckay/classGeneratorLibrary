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
    private {$column->getConvertedDataType()} {$column->getName()};

    public function get{$ucName}():{$column->getConvertedDataType()} {
        return \$this->{$column->getName()};    
    }
    
    public function set{$ucName}():{$column->getConvertedDataType()} {
        return \$this->{$column->getName()};    
    }
string;


	}

}