<?php
    namespace MicroFrame\Form\Elements;

    use MicroFrame\Form\AbstractElement;

    class Text extends AbstractElement
    {
        /**
         * Constructor
         *
         * @param string $strName Text field name
         * @param string $strLabel Text field label
         *
         * @since 22. February 2014, v. 1.00
         */
        public function __construct($strName = '', $strLabel = '')
        {
            parent::__construct(AbstractElement::ELEMENT_TEXT, $strName, $strLabel);
            return $this;
        }// __construct


        /**
         * Get text field html
         *
         * @since 22. February 2014, v. 1.00
         * @return string
         */
        public function getHtml()
        {
            return $this->getLabelAsHtml() . '<input type="text" name="' . $this->getName() . '"' . $this->getValueHtml() .
            $this->getPlaceholderHtml() . $this->getAttributesHtml() . ' />';
        }// getHtml


    }// Text