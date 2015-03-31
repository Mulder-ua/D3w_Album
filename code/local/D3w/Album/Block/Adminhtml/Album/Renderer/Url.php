<?php
/**
 * Created by PhpStorm.
 * User: ARadchenko
 * Date: 30.03.2015
 * Time: 11:06
 */
class D3w_Album_Block_Adminhtml_Album_Renderer_Url extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $photo)
    {
        $out['edit'] = Mage::helper('d3w_album')->__('edit');
        $out['delete'] = Mage::helper('d3w_album')->__('delete');
        $url['edit'] = $this->getEditUrl($photo);
        $url['delete'] = $this->getDeleteUrl($photo);
        $tmp = '<a href="' . $url['edit'] . '">' . $out['edit'] . '</a>';
        $tmp .= ' <a href="' . $url['delete'] . '">' . $out['delete'] . '</a>';
        return $tmp;
    }

    /**
     * Get edit url
     *
     * @param $row
     * @return string return edit url
     */
    public function getEditUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    /**
     * @param $row
     * @return string
     */
    public function getDeleteUrl($row)
    {
        return $this->getUrl('*/*/deletePhoto', array('id' => $row->getId()));
    }

    /**
     * Grid url getter
     *
     * @return string current grid url
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }
}