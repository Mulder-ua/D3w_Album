<?php
/**
 * Created by PhpStorm.
 * User: d3w
 * Date: 23.03.2015
 * Time: 21:25
 */
class D3w_Album_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction(){
        if (!Mage::helper('d3w_album')->isEnabled()) {
            return $this->_forward('noRoute');
        }

        $this->loadLayout();
        $listBlock = $this->getLayout()->getBlock('album.list');
        if ($listBlock) {
            $currentPage = abs(intval($this->getRequest()->getParam('p')));
            if ($currentPage <= 1) {
                $currentPage = 1;
            }
            $listBlock->setCurrentPage($currentPage);
            Mage::getSingleton('core/session')->setPage($currentPage);
        }
        $this->renderLayout();
    }

    /**
     * News view action
     */
    public function photoAction()
    {

        $itemId = $this->getRequest()->getParam('id');
        if (!$itemId) {
            return $this->_forward('noRoute');
        }
        /** @var $model Magentostudy_News_Model_Item */
        $model = Mage::getModel('d3w_album/photo');
        $model->load($itemId);
        $modelComments = Mage::getModel('d3w_album/comment')->getCollection()->addFilter('photo_id', $itemId);

        if (!$model->getId()) {
            return $this->_forward('noRoute');
        }
        Mage::register('d3w_album_photo', $model);
        Mage::register('d3w_album_comments', $modelComments);
        $this->loadLayout();
        $itemBlock = $this->getLayout()->getBlock('album.photo');

        if ($itemBlock) {

            $page = Mage::getSingleton('core/session')->getPage();
            $itemBlock->setPage($page ? (int)$page : 1);
        }
        $this->renderLayout();
    }


    public function addcommentAction()
    {
        $data = [
            'photo_id' => $this->_request->getParam('photo_id'),
            'username' => $this->_request->getParam('username'),
            'content' => $this->_request->getParam('content'),
        ];
        /** @var Mage_Core_Model_Session $session */
        $session = Mage::getSingleton('core/session');
        /** @var Mage_Core_Model_Abstract $comment */
        $comment = Mage::getModel('d3w_album/comment');
        $comment->setData($data);

        try {
            $comment->save();
        } catch (Mage_Core_Exception $e) {
            $session->addError($e->getMessage());
        } catch (Exception $e) {
            $session->addException($e, $this->__('An error occurred while adding comment.'));
        }
        return $this->_redirectReferer();
    }
}