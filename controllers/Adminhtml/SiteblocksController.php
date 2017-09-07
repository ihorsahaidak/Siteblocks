<?php
class Thesagaydak_Siteblocks_Adminhtml_SiteblocksController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('block_id');
        Mage::register('siteblocks_block', Mage::getModel('siteblocks/block')->load($id));

        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $id = $this->getRequest()->getParam('block_id');
        $block = Mage::getModel('siteblocks/block')->load($id);

        /*$block->setTitle($this->getRequest()->getParam('title'))->setContent()
            ->setContent($this->getRequest()->getParam('content'))->setContent()
            ->setBlockStatus($this->getRequest()->getParam('block_status'))->setContent()
            ->save();*/

        $block->setData($this->getRequest()->getParams())->save();

        var_dump($block->getData());die;
    }
}
