<?php

declare(strict_types=1);

namespace Slavlee\Advertisement\Domain\Repository;


use Slavlee\Advertisement\Utility\DebugUtility;

/**
 * This file is part of the "Advertisement" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Kevin Chileong Lee <support@slavlee.de>, Slavlee
 */

/**
 * The repository for Campaigns
 */
class CampaignRepository extends BaseRepository
{
	/**
	 * Find all campaigns for given banner
	 * @param \Slavlee\Advertisement\Domain\Model\Banner $banner
	 * @return \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
	 */
	public function findCampaignsForBanner(\Slavlee\Advertisement\Domain\Model\Banner $banner) : \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
	{
		$query = $this->createQuery();
		$query->matching(
			$query->contains('banners', $banner)
		);
		
		return $query->execute();
	}
}
