<?php

declare(strict_types=1);


namespace classGeneratorLibrary\NonBusinessLogic;


/**
 * Interface ClassGeneratorInterface
 * @package NonBusinessLogic
 */
interface ClassGeneratorInterface
{

    /**
     * @return string
     */
    public function generateFileContent(): string;

	/**
	 * @return string
	 */
    public function generateMethodsString(): string;

	/**
	 * @return string
	 */
    public function generatePropertiesString(): string;

}