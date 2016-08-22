<?php
namespace MicroFrame\Form\Elements;

use MicroFrame\Form\AbstractElement;

class Hidden extends AbstractElement
{
    /**
     * Constructor
     *
     * @param string $strName Hidden name
     *
     * @since 22. February 2014, v. 1.00
     */
    public function __construct($strName = '')
    {
        parent::__construct(AbstractElement::ELEMENT_HIDDEN, $strName, '');
        return $this;
    }// __construct


    /**
     * Get element html
     *
     * @since 22. February 2014, v. 1.00
     * @return string Hidden html
     */
    public function getHtml()
    {
        return '<input type="hidden" name="' . $this->getName() . '"' . $this->getValueHtml() .
            $this->getPlaceholderHtml() . ' />';
    }// getHtml


}// Hidden