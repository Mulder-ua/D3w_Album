<?php


class D3w_Album_Model_Resource_Photo_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('d3w_album/photo');
    }

    /**
     * Prepare for displaying in list
     *
     * @param int $page
     * @return Magentostudy_News_Model_Resource_Item_Collection
     */
    public function prepareForList($page)
    {
        $this->setPageSize(Mage::helper('d3w_album')->getNewsPerPage());
        $this->setCurPage($page)->setOrder('time_created', Varien_Data_Collection::SORT_ORDER_DESC);
        return $this;
    }
}