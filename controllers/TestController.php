<?php
class Thesagaydak_Siteblocks_TestController extends Mage_Core_Controller_Front_Action
{
    public function testAction()
    {
        $enabled = Mage::getStoreConfig('siteblocks/settings/enabled');
        $blocks = Mage::getStoreConfig('siteblocks/settings/blocks');
        $raw_text = Mage::getStoreConfig('siteblocks/settings/raw_text');

        //Mage::app()->getConfig()->saveConfig('siteblocks/settings/enabled', '0');
        var_dump($enabled, $blocks, $raw_text);
        die('test');
    }
}