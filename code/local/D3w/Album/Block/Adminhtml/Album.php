<?php
/**
 * Created by PhpStorm.
 * User: d3w
 * Date: 29.03.2015
 * Time: 14:12
 */

/**
 * Class D3w_Album_Block_Adminhtml_Album
 */
class D3w_Album_Block_Adminhtml_Album extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {

        $this->_blockGroup = 'd3w_album';
        $this->_controller = 'adminhtml_album';
        $this->_headerText = Mage::helper('d3w_album')->__('Manage Album');

        parent::__construct();
        //if (Mage::helper('d3w_album/admin')->isActionAllowed('save')) {
            $this->_updateButton('add', 'label', Mage::helper('d3w_album')->__('Add New Photo'));
       // } else {
         //   $this->_removeButton('add');
        //}
    }
}