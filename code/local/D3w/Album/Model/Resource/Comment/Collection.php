<?php


class D3w_Album_Model_Resource_Comment_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('d3w_album/comment');
        $this->setOrder('time_created', Varien_Data_Collection::SORT_ORDER_DESC);
    }   
}