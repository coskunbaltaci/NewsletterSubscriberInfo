<?php
namespace Coskun\NewsletterSubscriberInfo\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;
use Coskun\NewsletterSubscriberInfo\Block\Adminhtml\Form\Field\IsRequiredColumn;
use Coskun\NewsletterSubscriberInfo\Block\Adminhtml\Form\Field\TypeColumn;

/**
 * Class Ranges
 */
class TermsAndConditions extends AbstractFieldArray
{
    /**
     * @var IsRequired
     */
    private $isRequiredRenderer;
    
    /**
     * @var Type
     */
    private $typeRenderer;

    /**
     * Prepare rendering the new field by adding all the needed columns
     */
    protected function _prepareToRender()
    {
        $this->addColumn(
            'text', 
            [
                'label' => __('Text'), 
                'class' => 'required-entry'
            ]
        );
        $this->addColumn(
            'type', 
            [
                'label' => __('Type'), 
                'class' => 'required-entry',
                'renderer' => $this->getTypeRenderer()
            ]
        );
        $this->addColumn(
            'is_required', 
            [
                'label' => __('Is Required'),
                'renderer' => $this->getIsRequiredRenderer()
            ]
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    /**
     * Prepare existing row data object
     *
     * @param DataObject $row
     * @throws LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];

        $type = $row->getType();
        if ($type !== null) {
            $options['option_' . $this->getTypeRenderer()->calcOptionHash($type)] = 'selected="selected"';
        }
        $isRequired = $row->getIsRequired();
        if ($isRequired !== null) {
            $options['option_' . $this->getIsRequiredRenderer()->calcOptionHash($isRequired)] = 'selected="selected"';
        }

        $row->setData('option_extra_attrs', $options);
    }

    /**
     * @return IsRequiredColumn
     * @throws LocalizedException
     */
    private function getIsRequiredRenderer()
    {
        if (!$this->isRequiredRenderer) {
            $this->isRequiredRenderer = $this->getLayout()->createBlock(
                IsRequiredColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->isRequiredRenderer;
    }

    /**
     * @return TypeColumn
     * @throws LocalizedException
     */
    private function getTypeRenderer()
    {
        if (!$this->typeRenderer) {
            $this->typeRenderer = $this->getLayout()->createBlock(
                TypeColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->typeRenderer;
    }
}
