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

class Subscriber extends Subscribe
{
    protected $configInterface;

    public function __construct(
        ConfigInterface $configInterface,
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->configInterface = $configInterface;
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
}
