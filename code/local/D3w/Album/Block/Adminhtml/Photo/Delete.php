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
class D3w_Album_Block_Adminhtml_Photo_Delete extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        parent::__construct();
        $this->_blockGroup = 'd3w_album';
        $this->_controller = 'adminhtml_album';
        $this->_headerText = Mage::helper('d3w_album')->__('Edit Form');

    }
}