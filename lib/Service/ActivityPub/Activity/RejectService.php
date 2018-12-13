<?php
declare(strict_types=1);


/**
 * Nextcloud - Social Support
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2018, Maxence Lange <maxence@artificial-owl.com>
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


namespace OCA\Social\Service\ActivityPub\Activity;


use OCA\Social\Exceptions\UnknownItemException;
use OCA\Social\Model\ActivityPub\ACore;
use OCA\Social\Service\ActivityPub\ICoreService;
use OCA\Social\Service\ImportService;
use OCA\Social\Service\MiscService;


class RejectService implements ICoreService {


	/** @var MiscService */
	private $miscService;


	/**
	 * RejectService constructor.
	 *
	 * @param MiscService $miscService
	 */
	public function __construct(MiscService $miscService) {
		$this->miscService = $miscService;
	}


	/**
	 * @param ACore $item
	 * @param ImportService $importService
	 */
	public function processIncomingRequest(ACore $item, ImportService $importService) {
		if (!$item->gotObject()) {
			return;
		}
		$object = $item->getObject();

		try {
			$service = $importService->getServiceForItem($item->getObject());
			$service->activity($item, $object);
		} catch (UnknownItemException $e) {
		}
	}


	/**
	 * @param ACore $item
	 * @param ImportService $importService
	 */
	public function processResult(ACore $item, ImportService $importService) {
	}



	/**
	 * @param ACore $item
	 */
	public function save(ACore $item) {
	}


	/**
	 * @param ACore $item
	 */
	public function delete(ACore $item) {
	}

	/**
	 * @param ACore $activity
	 * @param ACore $item
	 */
	public function activity(ACore $activity, ACore $item) {
	}
}

