<?php


namespace NonBusinessLogic\Traits;


trait AbstractTrait
{

    private bool $abstract;

    /**
     * @return bool
     */
    public function isAbstract(): bool
    {
        return $this->abstract;
    }

    /**
     * @param bool $abstract
     */
    public function setAbstract(bool $abstract): void
    {
        $this->abstract = $abstract;
    }

    /**
     * @return string
     * @author Nicki Bo Otte <nbo@evercall.dk>
     */
    public function generateAbstractString():string {
        if($this->isAbstract())
            return 'abstract';
        else
            return '';
    }

}