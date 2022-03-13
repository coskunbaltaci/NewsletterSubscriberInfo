<?php
/*
 *
 *  * @author Coskun Baltaci
 *  * @copyright Copyright (c) 2022 "Coskun Baltaci"
 *
 */

namespace Coskun\NewsletterSubscriberInfo\Block;

use Magento\Framework\View\Element\Template;
use Magento\Newsletter\Block\Subscribe;
use Coskun\NewsletterSubscriberInfo\Api\ConfigInterface;
use Magento\Framework\Serialize\Serializer\Json as Serializer;

class Subscriber extends Subscribe
{
    protected $configInterface;

    protected $serializer;

    public function __construct(
        ConfigInterface $configInterface,
        Template\Context $context,
        Serializer $serializer,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->configInterface = $configInterface;
        $this->serializer = $serializer;
    }
    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->configInterface->getStatus();
    }
    /**
     * @return string|null
     */
    public function getFirstnameFieldStatus()
    {
        return $this->configInterface->getFirstnameFieldStatus();
    }
    /**
     * @return string|null
     */
    public function getFirstnameFieldLabel()
    {
        return $this->configInterface->getFirstnameFieldLabel();
    }
    /**
     * @return string|null
     */
    public function getLastnameFieldStatus()
    {
        return $this->configInterface->getLastnameFieldStatus();
    }
    /**
     * @return string|null
     */
    public function getLastnameFieldLabel()
    {
        return $this->configInterface->getLastnameFieldLabel();
    }
    /**
     * @return string|null
     */
    public function getEmailFieldLabel()
    {
        return $this->configInterface->getEmailFieldLabel();
    }
    /**
     * @return string|null
     */
    public function getSubmitButtonLabel()
    {
        return $this->configInterface->getSubmitButtonLabel();
    }
        /**
     * @return string|null
     */
    public function getTermsAndConditions()
    {
        if($this->configInterface->getTermsAndConditions()) {
            return $this->serializer->unserialize($this->configInterface->getTermsAndConditions());
        }
        return [];
    }
}
