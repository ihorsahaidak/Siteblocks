<?php

/**
 * Created by PhpStorm.
 * User: igorsagaydak
 * Date: 9/6/17
 * Time: 4:09 PM
 */
class Thesagaydak_Siteblocks_Model_Block extends Mage_Core_Model_Abstract
{
    public function __construct()
    {
        parent::_construct();
        $this->_init('siteblocks/block');
    }
}