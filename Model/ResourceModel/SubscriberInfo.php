<?php
/*
 *
 *  * @author Coskun Baltaci
 *  * @copyright Copyright (c) 2022 "Coskun Baltaci"
 *
 */

namespace Coskun\NewsletterSubscriberInfo\Model\ResourceModel;

class SubscriberInfo extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('coskun_newsletter_subcriber_info', 'entity_id');
    }
}
