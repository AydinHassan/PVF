<?php

class Atwix_PVF_Block_Adminhtml_Widget_Button extends Mage_Adminhtml_Block_Widget_Button
{
    /**
     * Block construct, setting data for button, getting current product
     */
    protected function _construct()
    {
        $product = Mage::registry('current_product');
        parent::_construct();
        $this->setData(array(
            'label'     => Mage::helper('catalog')->__('View Product Page'),
            'onclick'   => sprintf("window.open('%s')", $product->getProductUrl()),
            'disabled'  => !$this->isVisible($product),
            'title' => (!$this->isVisible($product))?
                Mage::helper('catalog')->__('Product is not visible on frontend'):
                Mage::helper('catalog')->__('View Product Page')
        ));
    }

    /**
     * Checking product visibility
     *
     * @param Mage_Catalog_Model_Product $product
     * @return bool
     */
    private function isVisible(Mage_Catalog_Model_Product $product)
    {
        return $product->isVisibleInCatalog() && $product->isVisibleInSiteVisibility();
    }
}