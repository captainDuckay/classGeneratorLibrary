<?php
declare(strict_types=1);


namespace NonBusinessLogic;


/**
 * Interface ClassGeneratorInterface
 * @package NonBusinessLogic
 */
interface ClassGeneratorInterface
{

	/**
	 * @return string
	 */
	public function generateFileContent():string;

}