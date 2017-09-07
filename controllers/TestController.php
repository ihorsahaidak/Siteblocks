<?php
class Thesagaydak_Siteblocks_TestController extends Mage_Core_Controller_Front_Action
{
    public function testAction()
    {
        $enabled = Mage::getStoreConfig('siteblocks/settings/blocks');
        var_dump($enabled);
        die('test');
    }
}