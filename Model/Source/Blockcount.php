<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright  Copyright (c) 2006-2017 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Used in creating options for Yes|No config value selection
 *
 */
class Thesagaydak_Siteblocks_Model_Source_Blockcount
{
    const ONE = '1';
    const TWO = '2';
    const THREE = '3';
    const FOUR = '4';

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => self::ONE, 'label'=>Mage::helper('siteblocks')->__('One')),
            array('value' => self::TWO, 'label'=>Mage::helper('siteblocks')->__('Two')),
            array('value' => self::THREE, 'label'=>Mage::helper('siteblocks')->__('Three')),
            array('value' => self::FOUR, 'label'=>Mage::helper('siteblocks')->__('Four')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            self::ONE => Mage::helper('siteblocks')->__('One'),
            self::TWO => Mage::helper('siteblocks')->__('Two'),
            self::THREE => Mage::helper('siteblocks')->__('Three'),
            self::FOUR => Mage::helper('siteblocks')->__('Four')
        );
    }

}
