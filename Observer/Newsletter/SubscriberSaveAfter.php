<?php
/*
 *
 *  * @author Coskun Baltaci
 *  * @copyright Copyright (c) 2022 "Coskun Baltaci"
 *
 */

namespace Coskun\NewsletterSubscriberInfo\Observer\Newsletter;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Newsletter\Model\SubscriberFactory;
use Magento\Framework\App\Request\Http;
use Coskun\NewsletterSubscriberInfo\Model\SubscriberInfoFactory;
use Coskun\NewsletterSubscriberInfo\Api\ConfigInterface;
use \Psr\Log\LoggerInterface;

class SubscriberSaveAfter implements ObserverInterface
{
    /**
     * @var Http
     */
    protected Http $request;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var SubscriberInfoFactory
     */
    protected $subscriberInfoFactory;

    /**
     * @var ConfigInterface
     */
    protected $configInterface;

    /**
     * SubscriberSaveAfter constructor.
     * @param LoggerInterface $logger
     * @param Http $request
     * @param SubscriberInfoFactory $subscriberInfoFactory
     * @param ConfigInterface $configInterface
     */
    public function __construct(
        LoggerInterface $logger,
        Http $request,
        SubscriberInfoFactory $subscriberInfoFactory,
        ConfigInterface $configInterface
    ) {
        $this->request = $request;
        $this->logger = $logger;
        $this->subscriberInfoFactory = $subscriberInfoFactory;
        $this->configInterface = $configInterface;
    }

    /**
     * @param Observer $observer
     * @return $this|void
     */
    public function execute(Observer $observer)
    {
        if ($this->request->isPost() && $this->configInterface->getStatus()) {
            $subscriberInfo = [];
            $validate = new \Zend_Validate_Regex("/^[a-zA-Z0-9ÆæÅåÄäÂâÀàÁáÄäÃãĀāÈèÉéÊêËëĒēĖėĘęÔôŒœŌōÕõØøÒòÓóÖöÜüĞğŞşİıÇç ,.-]{2,26}$/");
            if($this->configInterface->getFirstnameFieldStatus()) {
                if ($validate->isValid($this->request->getPost('firstname'))) {
                    $subscriberInfo['firstname'] = $this->request->getPost('firstname');
                }
            }
            if ($this->configInterface->getLastnameFieldStatus()) {
                if ($validate->isValid($this->request->getPost('lastname'))) {
                    $subscriberInfo['lastname'] = $this->request->getPost('lastname');
                }
            }
            if (!empty($subscriberInfo)) {
                $subscriber = $observer->getEvent()->getSubscriber();
                $subscriberInfo['subscriber_id'] = $subscriber->getId();
                $model = $this->subscriberInfoFactory->create();
                $model->setData($subscriberInfo);
                try {
                    $model->save();
                } catch(\Exception $e) {
                    $this->logger->warning('error', $e->meesage());
                }
            }
        }
        return $this;
    }
}
