<?php
/**
 * Created by PhpStorm.
 * User: ARadchenko
 * Date: 24.03.2015
 * Time: 19:31
 */
class D3w_Album_Block_List extends Mage_Core_Block_Template
{
    /**
     * News collection
     *
     * @var Magentostudy_News_Model_Resource_Item_Collection
     */
    protected $_newsCollection = null;
    /**
     * Retrieve news collection
     *
     * @return Magentostudy_News_Model_Resource_Item_Collection
     */
    protected function _getCollection()
    {
        return Mage::getModel('d3w_album/photo')->getResourceCollection();
    }
    /**
     * Retrieve prepared news collection
     *
     * @return Magentostudy_News_Model_Resource_Item_Collection
     */
    public function getCollection()
    {
        if (is_null($this->_newsCollection)) {
            $this->_newsCollection = $this->_getCollection();
            $this->_newsCollection->prepareForList($this->getCurrentPage());
        }
        return $this->_newsCollection;
    }
    /**
     * Return URL to item's view page
     *
     * @param Magentostudy_News_Model_Item $newsItem
     * @return string
     */
    public function getPhotoUrl($newsItem)
    {
        return $this->getUrl('*/*/photo', array('id' => $newsItem->getId()));
    }
    /**
     * Fetch the current page for the news list
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->getData('current_page') ? $this->getData('current_page') : 1;
    }
    /**
     * Get a pager
     *
     * @return string
     */
    public function getPager()
    {
        $pager = $this->getChild('album.list.pager');
        if ($pager) {
            $newsPerPage = Mage::helper('d3w_album')->getNewsPerPage();
            $pager->setAvailableLimit(array($newsPerPage => $newsPerPage));
            $pager->setTotalNum($this->getCollection()->getSize());
            $pager->setCollection($this->getCollection());
            $pager->setShowPerPage(true);
            return $pager->toHtml();
        }
        return null;
    }
    /**
     * Return URL for resized News Item image
     *
     * @param Magentostudy_News_Model_Item $item
     * @param int $width
     * @return string|false
     */
    public function getImageUrl($item, $width)
    {
        return Mage::helper('d3w_album/photo')->resize($item, $width);
    }
}