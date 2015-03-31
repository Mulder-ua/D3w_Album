<?php
/**
 * Created by PhpStorm.
 * User: d3w
 * Date: 24.03.2015
 * Time: 9:36
 */
class D3w_Album_Model_Comment extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('d3w_album/comment');
    }

    protected function _beforeSave()
    {
        if (!$this->getUsername() || !$this->getPhoto_id() || !$this->getContent()) {
            Mage::throwException(Mage::helper('d3w_album')->__('All fields have to be filled.'));
        }
        parent::_beforeSave();
    }
}