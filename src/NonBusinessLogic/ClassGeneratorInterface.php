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
    public function generateMethodString(): string;

	/**
	 * @return string
	 */
    public function generatePropertyString(): string;

}