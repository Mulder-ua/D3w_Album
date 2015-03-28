<?php
/**
 * Created by PhpStorm.
 * User: ARadchenko
 * Date: 24.03.2015
 * Time: 14:37
 */
class D3w_Album_Helper_Photo extends Mage_Core_Helper_Abstract
{
    const MEDIA_PATH = 'album';

    /**
     * Return the base media directory for News Item images
     *
     * @return string
     */
    /**
     * Maximum size for image in bytes
     * Default value is 1M
     *
     * @var int
     */
    protected $_maxFileSize = 1048576;
    /**
     * Array of image size limitation
     *
     * @var int
     */
    protected $_imageSize = array('minheight' => 50, 'minwidth' => 50, 'maxheight' => 800, 'maxwidth' => 800);


    public function setMaxImageFileSize($fileSize)
    {
        $this->_maxFileSize = (int) $fileSize;
        return $this;
    }
    /**
     * Set image size validation
     *
     * @param array|string $key
     * @param int $value
     * @return Magentostudy_News_Helper_Image
     */
    public function setImageSize($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($this->_imageSize as $k => $v) {
                if (!empty($key[$k])) {
                    $this->_imageSize[$k] = (int) $key[$k];
                }
            }
        } else if (is_string($key) && isset($this->_imageSize[$key]) && !empty($value)) {
            $this->_imageSize[$key] = (int) $value;
        }
        return $this;
    }
    /**
     * Remove news item image by image filename
     *
     * @param string $imageFile
     * @return bool
     */
    public function removeImage($imageFile)
    {
        $io = new Varien_Io_File();
        $io->open(array(
            'path' => $this->getBaseDir()
        ));
        if ($io->fileExists($imageFile)) {
            return $io->rm($imageFile);
        }
        return false;
    }
    /**
     * Upload image and return uploaded image file name or false
     *
     * @throws Mage_Core_Exception
     * @param string $scope the request key for file
     * @return bool|string
     */
    public function uploadImage($scope)
    {
        $adapter = new Zend_File_Transfer_Adapter_Http();
        $adapter->addValidator('ImageSize', true, $this->_imageSize);
        $adapter->addValidator('Size', true, $this->_maxFileSize);
        if ($adapter->isUploaded($scope)) {
            // validate image
            if (!$adapter->isValid($scope)) {
                Mage::throwException(Mage::helper('magentostudy_news')->__('Uploaded image is not
valid'));
            }
            $upload = new Varien_File_Uploader($scope);
            $upload->setAllowCreateFolders(true);
            $upload->setAllowedExtensions(array(
                'jpg',
                'gif',
                'png'
            ));
            $upload->setAllowRenameFiles(true);
            $upload->setFilesDispersion(false);
            if ($upload->save($this->getBaseDir())) {
                return $upload->getUploadedFileName();
            }
        }
        return false;
    }

    public function getBaseDir()
    {
        return Mage::getBaseDir('media') . DS . self::MEDIA_PATH;
    }

    /**
     * Return the Base URL for News Item images
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return Mage::getBaseUrl('media')  . self::MEDIA_PATH;
    }
    /**
     * Return URL for resized News Item Image
     *
     * @param Magentostudy_News_Model_Item $item
     * @param int $width
     * @param int $height
     * @return bool|string
     */
    public function resize(D3w_Album_Model_Photo $item, $width, $height = null)
    {
        if (!$item->getPhoto_img()) {
            return false;
        }
        if ($width < 10 || $width > 800) {
            return false;
        }
        $width = (int) $width;
        if (!is_null($height)) {
            if ($height < 10 || $height > 800) {
                return false;
            }
            $height = (int) $height;
        }
        $imageFile = $item->getPhoto_img();
        $cacheDir  = $this->getBaseDir() . DS . 'cache' . DS . $width;
        $cacheUrl  = $this->getBaseUrl() . '/' . 'cache' . '/' . $width . '/';
        $io        = new Varien_Io_File();
        $io->checkAndCreateFolder($cacheDir);
        $io->open(array(
            'path' => $cacheDir
        ));
        if ($io->fileExists($imageFile)) {
            return $cacheUrl . $imageFile;
        }
        try {
            $image = new Varien_Image($this->getBaseDir() . DS . $imageFile);
            $image->resize($width, $height);
            $image->save($cacheDir . DS . $imageFile);
            return $cacheUrl . $imageFile;
        }
        catch (Exception $e) {
            Mage::logException($e);
            return false;
        }
    }



}