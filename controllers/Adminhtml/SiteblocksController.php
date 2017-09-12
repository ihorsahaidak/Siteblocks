<?php
class Thesagaydak_Siteblocks_Adminhtml_SiteblocksController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Get grid index
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks'));
        $this->renderLayout();
    }

    /**
     * get new block action handler
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * get edit block action
     */
    public function editAction()
    {
        $id = $this->getRequest()->getParam('block_id');
        Mage::register('siteblocks_block', Mage::getModel('siteblocks/block')->load($id));

        $blockObject = (array)Mage::getSingleton('adminhtml/session')->getBlockObject(true);
        if(count($blockObject)) {
            Mage::registry('siteblock_block')->setData($blockObject);
        }

        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks_edit'));
        $this->renderLayout();
    }

    /**
     * post save block action
     */
    public function saveAction()
    {
        try {
            $id = $this->getRequest()->getParam('block_id');
            $block = Mage::getModel('siteblocks/block')->load($id);

            /*$block->setTitle($this->getRequest()->getParam('title'))->setContent()
                ->setContent($this->getRequest()->getParam('content'))->setContent()
                ->setBlockStatus($this->getRequest()->getParam('block_status'))->setContent()
                ->save();*/

            $block->setData($this->getRequest()->getParams())
                ->setCreatedAt(Mage::app()->getLocale()->date())
                ->save();

            if(!$block->getId()) {
                Mage::getSingleton('adminhtml/session')->addError('Cannot save the block!');
            }
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            Mage::getSingleton('adminhtml/session')->setBlockObject($block->getData());
        }
        Mage::getSingleton('adminhtml/session')->addSuccess('Block was saved successfully');

        $this->_redirect('*/*/'.$this->getRequest()->getParam('back', 'index'), array('block_id' => $block->getId()));
    }

    /**
     * post delete block action
     */
    public function deleteAction()
    {
        $block = Mage::getModel('siteblocks/block')
            ->setId($this->getRequest()->getParam('block_id'))
            ->delete();

        if($block->getId()) {
            Mage::getSingleton('adminhtml/session')->addSuccess('Block was deleted successfully');
        }
        $this->_redirect('*/*/');
    }

    public function massStatusAction()
    {
        $statuses = $this->getRequest()->getParams();
        try {
            $blocks = Mage::getModel('siteblocks/block')
                ->getCollection()
                ->addFieldToFilter('block_id', array('in'=>$statuses['massaction']));
            foreach ($blocks as $block) {
                $block->setBlockStatus($statuses['block_status'])->save();
            }
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            return $this->_redirect('*/*/');
        }
        Mage::getSingleton('adminhtml/session')->addSuccess('Blocks are updated!');
        return $this->_redirect('*/*/');
    }

    /**
     * @return $this|Mage_Core_Controller_Varien_Action
     */
    public function massDeleteAction()
    {
        $blocks = $this->getRequest()->getParams();
        try {
            $blocks = Mage::getModel('siteblocks/block')
                ->getCollection()
                ->addFieldToFilter('block_id', array('in'=>$blocks['massaction']));
            foreach ($blocks as $block) {
                $block->delete();
            }
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            return $this->_redirect('*/*/');
        }
        Mage::getSingleton('adminhtml/session')->addSuccess('Blocks are deleted!');
        return $this->_redirect('*/*/');
    }
}

