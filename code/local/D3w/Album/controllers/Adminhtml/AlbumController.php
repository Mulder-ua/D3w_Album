<?php
/**
 * Created by PhpStorm.
 * User: d3w
 * Date: 28.03.2015
 * Time: 15:14
 */
class D3w_Album_Adminhtml_AlbumController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        $this->loadLayout()
            ->_setActiveMenu('album/manage')
            ->_addBreadcrumb(
                Mage::helper('d3w_album')->__('Album'),
                Mage::helper('d3w_album')->__('Album')
            )
            ->_addBreadcrumb(
                Mage::helper('d3w_album')->__('Manage Album'),
                Mage::helper('d3w_album')->__('Manage Album')
            )
        ;
        return $this;
    }

    public function indexAction()
    {
        $this->_title($this->__('Album'))
            ->_title($this->__('Manage Album'));
        $this->_initAction();
        $this->renderLayout();
    }

    public function commentsAction()
    {
        $this->_title($this->__('Album'))
            ->_title($this->__('Manage Comments'));
        $this->_initAction();
        $this->renderLayout();
    }

    public function deletePhotoAction()
    {
        $this->_title($this->__('Album'))
            ->_title($this->__('Delete Photo'));
        $this->_initAction();
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_title($this->__('Album'))
            ->_title($this->__('Edite Photo'));
        $this->_initAction();
        $this->renderLayout();

    }

    public function newAction()
    {
        return $this->_redirect('*/*/edit/');
    }

    public function deleteAction()
    {
        echo "Delete succ!";
    }
}