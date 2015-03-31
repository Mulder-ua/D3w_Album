<?php
/**
 * Created by PhpStorm.
 * User: d3w
 * Date: 29.03.2015
 * Time: 14:15
 */
class D3w_Album_Block_Adminhtml_Album_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Init Grid default properties
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('d3w_list_grid');
        $this->setDefaultSort('time_created');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    /**
     * Prepare collection for Grid
     *
     * @return Magentostudy_News_Block_Adminhtml_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('d3w_album/photo')->getResourceCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    /**
     * Prepare Grid columns
     *
     * @return Mage_Adminhtml_Block_Catalog_Search_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('photo_id', array(
            'header' => Mage::helper('d3w_album')->__('ID'),
            'width' => '50px',
            'index' => 'photo_id',
        ));
        $this->addColumn('photo_name', array(
            'header' => Mage::helper('d3w_album')->__('Photo Name'),
            'index' => 'photo_name',
        ));
        $this->addColumn('photo_img', array(
            'header' => Mage::helper('d3w_album')->__('Photo'),
            'index' => 'photo_img',
            'width' => '100px',
            'filter' => false,
            'renderer' => 'D3w_Album_Block_Adminhtml_Album_Renderer_Image',
        ));
        $this->addColumn('time_created', array(
            'header' => Mage::helper('d3w_album')->__('Created'),
            'sortable' => true,
            'width' => '170px',
            'index' => 'time_created',
            'type' => 'datetime',
        ));
        $this->addColumn('action',
            array(
                'header' => Mage::helper('d3w_album')->__('Action'),
                'width' => '70px',
                'type' => 'action',
                'filter' => false,
                'sortable' => false,
                'renderer' => 'D3w_Album_Block_Adminhtml_Album_Renderer_Url',
            ));
        return parent::_prepareColumns();
    }
    /**
     * Return row URL for js event handlers
     *
     * @return string
     */

}