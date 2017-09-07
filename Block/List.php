<?php
class Thesagaydak_Siteblocks_Block_List extends Mage_Core_Block_Template
{
    public function getBlocks()
    {
        return Mage::getModel('siteblocks/block')
            ->getCollection()
            ->addFieldToFilter('block_status', array('eq' => Thesagaydak_Siteblocks_Model_Source_Status::ENABLED));
        //return Mage::getResourceModel('siteblocks/block_collection');
    }
}