<?php
/*
 *
 *  * @author Coskun Baltaci
 *  * @copyright Copyright (c) 2022 "Coskun Baltaci"
 *
 */

namespace Coskun\NewsletterSubscriberInfo\Model;

use \Magento\Store\Model\ScopeInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;
use Coskun\NewsletterSubscriberInfo\Api\ConfigInterface;

class Config implements ConfigInterface
{
    const XML_PATH_STATUS = "coskun_newslettersubscriberinfo/general/status";
    const XML_PATH_FIRSTNAME_FIELD_STATUS = "coskun_newslettersubscriberinfo/general/firstname_field_status";
    const XML_PATH_FIRSTNAME_FIELD_LABEL = "coskun_newslettersubscriberinfo/general/firstname_field_label";
    const XML_PATH_LASTNAME_FIELD_STATUS = "coskun_newslettersubscriberinfo/general/lastname_field_status";
    const XML_PATH_LASTNAME_FIELD_LABEL = "coskun_newslettersubscriberinfo/general/lastname_field_label";
    const XML_PATH_EMAIL_FIELD_LABEL = "coskun_newslettersubscriberinfo/general/email_field_label";
    const XML_PATH_SUBMIT_BUTTON_LABEL = "coskun_newslettersubscriberinfo/general/submit_button_label";
    const XML_PATH_TERMS_AND_CONDITIONS = "coskun_newslettersubscriberinfo/general/terms_and_conditions";

    /**
     * @var ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * ScopeConfig constructor.
     * @param ScopeConfigInterface $_scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $_scopeConfig
    ){
        $this->_scopeConfig = $_scopeConfig;
    }

    /**
     * @param string|null $storeViewCode
     * @return string|null
     */
    public function getStatus(string $storeViewCode = null): ?string
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_STATUS,
            ScopeInterface::SCOPE_STORE,
            $storeViewCode
        );
    }

    /**
     * @param string|null $storeViewCode
     * @return string|null
     */
    public function getFirstnameFieldStatus(string $storeViewCode = null): ?string
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_FIRSTNAME_FIELD_STATUS,
            ScopeInterface::SCOPE_STORE,
            $storeViewCode
        );
    }

    /**
     * @param string|null $storeViewCode
     * @return string|null
     */
    public function getFirstnameFieldLabel(string $storeViewCode = null): ?string
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_FIRSTNAME_FIELD_LABEL,
            ScopeInterface::SCOPE_STORE,
            $storeViewCode
        );
    }

    /**
     * @param string|null $storeViewCode
     * @return string|null
     */
    public function getLastnameFieldStatus(string $storeViewCode = null): ?string
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_LASTNAME_FIELD_STATUS,
            ScopeInterface::SCOPE_STORE,
            $storeViewCode
        );
    }

    /**
     * @param string|null $storeViewCode
     * @return string|null
     */
    public function getLastnameFieldLabel(string $storeViewCode = null): ?string
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_LASTNAME_FIELD_LABEL,
            ScopeInterface::SCOPE_STORE,
            $storeViewCode
        );
    }

    /**
     * @param string|null $storeViewCode
     * @return string|null
     */
    public function getEmailFieldLabel(string $storeViewCode = null): ?string
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_EMAIL_FIELD_LABEL,
            ScopeInterface::SCOPE_STORE,
            $storeViewCode
        );
    }

    /**
     * @param string|null $storeViewCode
     * @return string|null
     */
    public function getSubmitButtonLabel(string $storeViewCode = null): ?string
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_SUBMIT_BUTTON_LABEL,
            ScopeInterface::SCOPE_STORE,
            $storeViewCode
        );
    }

    /**
     * @param string|null $storeViewCode
     * @return string|null
     */
    public function getTermsAndConditions(string $storeViewCode = null): ?string
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_TERMS_AND_CONDITIONS,
            ScopeInterface::SCOPE_STORE,
            $storeViewCode
        );
    }

}
