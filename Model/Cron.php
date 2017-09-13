<?php
class Thesagaydak_Siteblocks_Model_Cron
{
    public function siteblocks_clear_cache()
    {
        //do smth here
        Mage::app()->cleanCache(array('siteblocks_blocks'));
    }
}
