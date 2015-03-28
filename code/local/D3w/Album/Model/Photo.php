<?php
/**
 * Created by PhpStorm.
 * User: d3w
 * Date: 23.03.2015
 * Time: 21:34
 */

class D3w_Album_Model_Photo extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('d3w_album/photo');
    }
}