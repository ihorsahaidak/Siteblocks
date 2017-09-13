<?php
class Thesagaydak_Siteblocks_Model_Observer
{
    /**
     * @param $observer Varien_Event_Observer
     */
    public function checkout_cart_product_add_after($observer)
    {
        var_dump($observer->getEvent()->getData('quote_item')->getData());
    }
}