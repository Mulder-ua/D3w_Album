<?php
/**
 * Created by PhpStorm.
 * User: ARadchenko
 * Date: 30.03.2015
 * Time: 15:08
 */


class D3w_Album_Block_Adminhtml_Photo_Delete_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Prepare FORM action
     *
     * @return Magentostudy_News_Block_Adminhtml_News_Edit_Form
     */
    protected function _prepareForm()
    {
        echo "delete";

        return parent::_prepareForm();
    }
}