<?php


namespace classGeneratorLibrary\NonBusinessLogic;


use classGeneratorLibrary\NonBusinessLogic\Traits\UseTrait;

class UseClass {

	private TraitClass $trait;

	/**
	 * @return TraitClass
	 */
	public function getTrait(): TraitClass {

		return $this->trait;
	}

	/**
	 * @param TraitClass $trait
	 */
	public function setTrait( TraitClass $trait ): void {

		$this->trait = $trait;
	}

	/**
	 * UseClass constructor.
	 *
	 * @param TraitClass $trait
	 */
	public function __construct( TraitClass $trait ) {

		$this->trait = $trait;
	}


	/**
	 * @return string
	 */
	public function generateUseString() {

		return "use {$this->getTrait()->getNamespace()}\\{$this->getTrait()->getName()};";

	}

}