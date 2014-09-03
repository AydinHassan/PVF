<?php

class Atwix_PVF_Model_Observer
{
    public function addPVFButton($observer)
    {
        $block  = $observer->getBlock();
        $type   = $block->getType();
        if ($type === 'adminhtml/catalog_product_edit') {
            if ($deleteButton = $block->getChild('delete_button')) {
                $block->setChild('product_view_button',
                    $block->getLayout()->createBlock('atwix_pvf/adminhtml_widget_button')
                );
                $deleteButton->setBeforeHtml($block->getChild('product_view_button')->toHtml());
            }
        }
    }
}
