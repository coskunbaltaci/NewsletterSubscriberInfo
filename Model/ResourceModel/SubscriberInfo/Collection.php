<?php
/*
 *
 *  * @author Coskun Baltaci
 *  * @copyright Copyright (c) 2022 "Coskun Baltaci"
 *
 */

namespace Coskun\NewsletterSubscriberInfo\Model\ResourceModel\SubscriberInfo;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
	protected $_eventPrefix = 'coskun_newslettersubscriberinfo_subscriber_info_collection';
	protected $_eventObject = 'subscriber_info_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Coskun\NewsletterSubscriberInfo\Model\SubscriberInfo', 'Coskun\NewsletterSubscriberInfo\Model\ResourceModel\SubscriberInfo');
    }
}
