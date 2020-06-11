<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic\Traits;


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
     */
    public function setReturnType(string $returnType): void
    {
        $this->returnType = $returnType;
    }

    /**
     * @return string
     */
    private function generateReturnTypeString(): string
    {
        if ($this->getReturnType() == '') {
            return '';
        } else {
            return ": {$this->getReturnType()}";
        }
    }

	public function getConvertedReturnType(): string
	{

		switch (strtoupper($this->getReturnType())) {
			//string
			case 'CHAR':
			case 'VARCHAR':
			case 'BINARY':
			case 'VARBINARY':
			case 'TINYBLOB':
			case 'BLOB':
			case 'MEDIUMBLOB':
			case 'LONGBLOB':
			case 'TINYTEXT':
			case 'TEXT':
			case 'MEDIUMTEXT':
			case 'LONGTEXT':
			case 'ENUM':
			case 'SET':
			case 'DATE':
			case 'TIME':
			case 'DATETIME':
			case 'TIMESTAMP':
			case 'YEAR':
			case 'JSON':
				return 'string';
			case 'SMALLINT':
			case 'MEDIUMINT':
			case 'INT':
			case 'BIGINT':
				return 'int';
			case 'FLOAT':
			case 'DOUBLE':
				return 'float';
			case 'TINYINT':
			case 'BIT':
				return 'bool';
			default:
				die($this->getReturnType() . " isn't mapped");
		}

	}
}