<?php
/**
 * Created by PhpStorm.
 * User: ARadchenko
 * Date: 24.03.2015
 * Time: 19:34
 */
class D3w_Album_Block_Photo extends Mage_Core_Block_Template
{
    /**
     * Current news item instance
     *
     * @var Magentostudy_News_Model_Item
     */
    protected $_item;
    /**
     * Return parameters for back url
     *
     * @param array $additionalParams
     * @return array
     */
    protected function _getBackUrlQueryParams($additionalParams = array())
    {
        return array_merge(array('p' => $this->getPage()), $additionalParams);
    }
    /**
     * Return URL to the news list page
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/', array('_query' => $this->_getBackUrlQueryParams()));
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

    public function getPostActionUrl()
    {
        return Mage::helper('d3w_album')->getAddCommentPostUrl();
    }
}