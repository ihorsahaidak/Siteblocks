<?php
class Thesagaydak_Siteblocks_TestController extends Mage_Core_Controller_Front_Action
{
    public function testAction()
    {
        var_dump($this->getRequest()->getParams());
        die('test');
    }
}