<?php
namespace MicroFrame\Form;

abstract class AbstractElement implements iElement
{
    /**
     * AbstractElement types
     * @var string
     */
    const ELEMENT_HIDDEN    = 'hidden';
    const ELEMENT_SELECT    = 'select';
    const ELEMENT_TEXT      = 'text';
    const ELEMENT_PASSWORD  = 'password';
    const ELEMENT_TEXTAREA  = 'textarea';
    const ELEMENT_RANGE     = 'range';
    const ELEMENT_FILE      = 'file';
    const ELEMENT_SUBMIT    = 'submit';
    const ELEMENT_RESET     = 'reset';
    const ELEMENT_BUTTON    = 'button';

    /**
     * AbstractElement type
     * @var string
     */
    private $strType;

    /**
     * AbstractElement name
     * @var string
     */
    private $strName;

    /**
     * AbstractElement label
     * @var string
     */
    private $strLabel;

    /**
     * AbstractElement value
     * @var string
     */
    private $strValue;

    /**
     * AbstractElement placeholder
     * @var string
     */
    private $strPlaceholder = '';

    /**
     * Flag required
     * @var boolean (true|false)
     */
    private $blnRequired = false;

    /**
     * AbstractElement attributes
     * @var array
     */
    private $aryAttributes = array();

    /**
     * AbstractElement error
     * @var string
     */
    private $strError;


    /**
     * Constructor
     *
     * @param string $strType AbstractElement type
     * @param string $strName AbstractElement name
     * @param string $strLabel AbstractElement label
     *
     * @since 22. February 2014, v. 1.00
     */
    public function __construct($strType, $strName = '', $strLabel = '')
    {
        $this->strType = $strType;
        $this->strName = $strName;
        $this->strLabel = $strLabel;
        $this->setAttribute('id', $strName);
        return $this;
    }// __construct


    /**
     * Check if field shall skip field contain
     *
     * @since 29. February 2014, v. 1.00
     * @return boolean True if skip, false otherwise
     */
    public function isSkipFieldContain()
    {
        $blnSkip = false;
        $strType = $this->getType();
        if(in_array($strType, array(self::ELEMENT_BUTTON, self::ELEMENT_SUBMIT,
            self::ELEMENT_RESET, self::ELEMENT_HIDDEN)))
        {
            $blnSkip = true;
        }
        return $blnSkip;
    }// isSkipFieldContain


    /**
     * Get element type
     *
     * @since 22. February 2014, v. 1.00
     * @return string AbstractElement type
     */
    public function getType()
    {
        return $this->strType;
    }// getType


    /**
     * Get element name
     *
     * @since 22. February 2014, v. 1.00
     * @return string AbstractElement name
     */
    public function getName()
    {
        return $this->strName;
    }// getName


    /**
     * Get element label
     *
     * @since 22. February 2014, v. 1.00
     * @return string AbstractElement label
     */
    private function getLabel()
    {
        return $this->strLabel;
    }// getName


    /**
     * Get element label as html
     *
     * @since 22. February 2014, v. 1.00
     * @return string AbstractElement label as html <label>strLabel</label>
     */
    public function getLabelAsHtml()
    {
        $strLabel = $this->getLabel();
        if($strLabel)
        {
            $strLabel .= ':';
        }
        return '<label for="' . $this->getName() . '">' . $strLabel . '</label>';
    }// getLabel


    /**
     * Set element value
     *
     * @param mixed $mxdValue AbstractElement value
     *
     * @since 22. February 2014, v. 1.00
     * @return AbstractElement
     */
    public function setValue($mxdValue)
    {
        $this->strValue = $mxdValue;
        return $this;
    }// setValue


    /**
     * Get element value
     *
     * @since 22. February 2014, v. 1.00
     * @return mixed AbstractElement value
     */
    public function getValue()
    {
        return $this->strValue;
    }// getValue


    /**
     * Get element value as html
     *
     * @since 22. February 2014, v. 1.00
     * @return mixed|string AbstractElement value as html
     */
    public function getValueHtml()
    {
        $strType = $this->getType();
        if($strType == self::ELEMENT_SUBMIT || $strType == self::ELEMENT_RESET)
        {
            $strValue = $this->getLabel();
        }
        else
        {
            $strValue = $this->getValue();
        }
        if($strValue)
        {
            $strValue = ' value="' . $strValue . '"';
        }
        return $strValue;
    }// getValueHtml


    /**
     * Set element required
     *
     * @param boolean $blnRequired Flag if required
     *
     * @since 22. February 2014, v. 1.00
     * @return AbstractElement
     */
    public function setRequired($blnRequired)
    {
        if(is_bool($blnRequired))
        {
            $this->blnRequired = $blnRequired;
        }
        return $this;
    }// setRequired


    /**
     * Check if element is required
     *
     * @since 22. February 2014, v. 1.00
     * @return boolean True if required, false if not
     */
    private function isRequired()
    {
        return $this->blnRequired;
    }// isRequired


    /**
     * Set element placeholder
     *
     * @param string $strPlaceholder Placeholder
     *
     * @since 22. February 2014, v. 1.00
     * @return AbstractElement
     */
    public function setPlaceholder($strPlaceholder)
    {
        if(is_string($strPlaceholder))
        {
            $this->strPlaceholder = $strPlaceholder;
        }
        return $this;
    }// setPlaceholder


    /**
     * Get element placeholder
     *
     * @since 22. February 2014, v. 1.00
     * @return string AbstractElement placeholder
     */
    private function getPlaceholder()
    {
        return $this->strPlaceholder;
    }// getPlaceholder


    /**
     * Get element placeholder as html
     *
     * @since 22. February 2014, v. 1.00
     * @return string AbstractElement placeholder as html (placeholder="strPlaceholder")
     */
    public function getPlaceholderHtml()
    {
        $strPlaceholder = $this->getPlaceholder();
        if($strPlaceholder)
        {
            $strPlaceholder = ' placeholder="' . $strPlaceholder . '"';
        }
        return $strPlaceholder;
    }// getPlaceholderHtml


    /**
     * Set element attribute
     *
     * @param string $strKey AbstractElement attribute key
     * @param string $strValue AbstractElement attribute value
     *
     * @since 13. March 2014, v. 1.00
     * @return AbstractElement
     */
    public function setAttribute($strKey, $strValue)
    {
        $this->setAttributes(array($strKey => $strValue));
        return $this;
    }// setAttribute


    /**
     * Set element attributes
     *
     * @param array $aryAttributes AbstractElement attributes as single array
     *
     * @since 22. February 2014, v. 1.00
     * @return AbstractElement
     */
    public function setAttributes($aryAttributes)
    {
        if(is_array($aryAttributes))
        {
            $this->aryAttributes = array_merge($this->aryAttributes, $aryAttributes);
        }
        return $this;
    }// setAttributes


    /**
     * Get element attributes
     *
     * @since 22. February 2014, v. 1.00
     * @return array AbstractElement attributes
     */
    public function getAttributes()
    {
        return $this->aryAttributes;
    }// getAttributes


    /**
     * Get element attributes as html
     *
     * @since 25. February 2014, v. 1.00
     * @return string AbstractElement attributes as html
     */
    public function getAttributesHtml()
    {
        $strHtml = '';
        $aryAttributes = $this->getAttributes();
        if(count($aryAttributes))
        {
            foreach($aryAttributes as $strKey => $strValue)
            {
                $strHtml .= ' ' . $strKey . '="' . $strValue . '"';
            }
        }
        return $strHtml;
    }// getAttributesHtml


    /**
     * Remove element attribute
     *
     * @param string $strAttribute Attribute name
     *
     * @since 22. February 2014, v. 1.00
     * @return void
     */
    private function removeAttribute($strAttribute)
    {
        $aryAttributes = $this->getAttributes();
        if(isset($aryAttributes[$strAttribute]))
        {
            unset($this->aryAttributes[$strAttribute]);
        }
    }// removeAttribute


    /**
     * Disable element
     *
     * @param boolean $blnDisabled True/false
     *
     * @since 22. February 2014, v. 1.00
     * @return AbstractElement
     */
    public function setDisabled($blnDisabled)
    {
        $this->removeAttribute('disabled');
        if(is_bool($blnDisabled) && $blnDisabled == true)
        {
            $this->setAttribute('disabled', 'disabled');
        }
        return $this;
    }// setDisabled


    /**
     * Set read only on element
     *
     * @param boolean $blnReadOnly Read only
     *
     * @since 11. March 2014, v. 1.00
     * @return AbstractElement
     */
    public function setReadOnly($blnReadOnly)
    {
        $this->removeAttribute('readonly');
        if(is_bool($blnReadOnly) && $blnReadOnly == true)
        {
            $this->setAttribute('readonly', 'readonly');
        }
        return $this;
    }// setReadOnly


    /**
     * Validate value against element rules
     *
     * @param string $strValue Value to validate
     *
     * @since 22. February 2014, v. 1.00
     * @return boolean True if validated, false if not
     */
    public function validate($strValue)
    {
        $blnValid = true;
        if($this->isRequired() && $strValue == '' && !in_array($this->getType(), array(AbstractElement::ELEMENT_SUBMIT,
                AbstractElement::ELEMENT_RESET, AbstractElement::ELEMENT_BUTTON)))
        {
            $this->setError(_REQUIRE_FIELD);
            $blnValid = false;
        }
        return $blnValid;
    }// validate


    /**
     * Set element error
     *
     * @param $strError AbstractElement error
     *
     * @since 25. February 2014, v. 1.00
     * @return AbstractElement
     */
    private function setError($strError)
    {
        $this->strError = $strError;
        return $this;
    }// setError


    /**
     * Get element error
     *
     * @since 25. February 2014, v. 1.00
     * @return string AbstractElement error
     */
    public function getError()
    {
        return $this->strError;
    }// getError


}// AbstractElement