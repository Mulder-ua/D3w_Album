<?php
/**
 * Created by PhpStorm.
 * User: d3w
 * Date: 23.03.2015
 * Time: 21:38
 */

class D3w_Album_Model_Resource_Photo extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('d3w_album/photo', 'photo_id');
    }
}