<?php
/**
 * Created by PhpStorm.
 * User: ARadchenko
 * Date: 24.03.2015
 * Time: 14:44
 */
class D3w_Album_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * News Item instance for lazy loading
     *
     * @var Magentostudy_News_Model_Item
     */
    protected $_albumPhotoInstance;
    protected $_comentsPhotoInstance;
    /**
     * Checks whether news can be displayed in the frontend
     *
     * @return boolean
     */
    public function isEnabled()
    {
        // For now it's always enabled
        return true;
    }
    /**
     * Return the number of items per page
     *
     * @return int
     */
    public function getNewsPerPage()
    {
        // For now it's always 15
        return 15;
    }
    /**
     * Return current news item instance from the Registry
     *
     * @return Magentostudy_News_Model_Item
     */
    public function getAlbumPhotoInstance()
    {
        if (!$this->_albumPhotoInstance) {
            $this->_albumPhotoInstance = Mage::registry('d3w_album_photo');
            if (!$this->_albumPhotoInstance) {

                Mage::throwException($this->__('News item instance does not exist in Registry'));
            }
        }
        return $this->_albumPhotoInstance;
    }

    public function getAlbumCommentsInstance()
    {
        if (!$this->_comentsPhotoInstance) {
            $this->_comentsPhotoInstance = Mage::registry('d3w_album_comments');
            if (!$this->_comentsPhotoInstance) {

                Mage::throwException($this->__('Comments instance does not exist in Registry'));
            }
        }
        return $this->_comentsPhotoInstance;
    }

    public function getAddCommentPostUrl()
    {
        return $this->_getUrl('album/index/addcomment');
    }
}