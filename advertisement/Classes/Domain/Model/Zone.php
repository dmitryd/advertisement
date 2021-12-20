<?php

declare(strict_types=1);

namespace Slavlee\Advertisement\Domain\Model;


use Slavlee\Advertisement\Utility\ZoneUtility;

/**
 * This file is part of the "Advertisement" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Kevin Chileong Lee <support@slavlee.de>, Slavlee
 */

/**
 * Zone
 */
class Zone extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * height
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $height = '';

    /**
     * width
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $width = '';
    
    /**
     * banners
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Slavlee\Advertisement\Domain\Model\Banner>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $banners = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
    
    	// Do not remove the next line: It would break the functionality
    	$this->initializeObject();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the height
     *
     * @return string $height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Sets the height
     *
     * @param string $height
     * @return void
     */
    public function setHeight(string $height)
    {
        $this->height = $height;
    }

    /**
     * Returns the width
     *
     * @return string $width
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Sets the width
     *
     * @param string $width
     * @return void
     */
    public function setWidth(string $width)
    {
        $this->width = $width;
    }
    
    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
    	$this->banners = $this->banners ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Adds a Banner
     *
     * @param \Slavlee\Advertisement\Domain\Model\Banner $banner
     * @return void
     */
    public function addBanner(\Slavlee\Advertisement\Domain\Model\Banner $banner)
    {
    	$this->banners->attach($banner);
    }
    
    /**
     * Removes a Banner
     *
     * @param \Slavlee\Advertisement\Domain\Model\Banner $bannerToRemove The Banner to be removed
     * @return void
     */
    public function removeBanner(\Slavlee\Advertisement\Domain\Model\Banner $bannerToRemove)
    {
    	$this->banners->detach($bannerToRemove);
    }
    
    /**
     * Returns the banners
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Slavlee\Advertisement\Domain\Model\Banner> $banners
     */
    public function getBanners()
    {
    	return $this->banners;
    }
    
    /**
     * Get the banner to display next request
     * based on prior
     * @return \Slavlee\Advertisement\Domain\Model\Banner
     */
    public function getNextBanner()
    {
    	return ZoneUtility::getNextBanner($this->banners);
    }
    
    /**
     * Sets the banners
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Slavlee\Advertisement\Domain\Model\Banner> $banners
     * @return void
     */
    public function setBanners(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $banners)
    {
    	$this->banners = $banners;
    }
}
