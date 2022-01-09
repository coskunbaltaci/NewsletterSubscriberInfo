<?php
/*
 *
 *  * @author Coskun Baltaci
 *  * @copyright Copyright (c) 2022 "Coskun Baltaci"
 *
 */

namespace Coskun\NewsletterSubscriberInfo\Block\Newsletter\Adminhtml\Template\Grid\Renderer;

use Magento\Backend\Block\Context;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Coskun\NewsletterSubscriberInfo\Model\SubscriberInfoFactory;
use Magento\Framework\DataObject;

class Firstname extends AbstractRenderer
{
    /**
     * @var SubscriberInfoFactory
     */
    protected $subscriberInfoFactory;

    /**
     * Firstname constructor.
     * @param Context $context
     * @param SubscriberInfoFactory $subscriberInfoFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        SubscriberInfoFactory $subscriberInfoFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->subscriberInfoFactory = $subscriberInfoFactory;
    }

    /**
     * @param DataObject $row
     * @return array|mixed|string|null
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        if($row->getData('type')==1){
            $getSubscriberInfo = $this->subscriberInfoFactory->create()->getCollection()
                ->addFieldToFilter('subscriber_id', $row->getData('subscriber_id'));
            if($getSubscriberInfo->getSize() > 0) {
                $subscriberInfo = $getSubscriberInfo->getFirstItem();
                return $subscriberInfo->getData('firstname');
            }
            return '';
        } else{
            return ($row->getData('firstname') != '' ? $row->getData('firstname') : '');
        }
    }
}
