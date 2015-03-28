<?php
/**
 * Created by PhpStorm.
 * User: d3w
 * Date: 24.03.2015
 * Time: 9:36
 */
class D3w_Album_Model_Resource_Comment extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('d3w_album/comment', 'comment_id');
    }
}