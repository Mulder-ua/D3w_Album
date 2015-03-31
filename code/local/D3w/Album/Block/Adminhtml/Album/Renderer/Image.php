<?php
/**
 * Created by PhpStorm.
 * User: ARadchenko
 * Date: 30.03.2015
 * Time: 9:53
 */
class D3w_Album_Block_Adminhtml_Album_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $photo)
    {
        $photo_url = Mage::helper('d3w_album/photo')->resize($photo, 200);
        $out = "<img src=". $photo_url ." width='97px'/>";
        return $out;
    }
}