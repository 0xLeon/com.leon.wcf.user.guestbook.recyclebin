<?php
require_once(WCF_DIR.'lib/data/cronjobs/Cronjob.class.php');

/**
 * Cronjob empties the recycle bin for user guestbook entries.
 * 
 * @author	Stefan Hahn
 * @copyright	2012, Stefan Hahn
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.leon.wcf.user.guestbook.recyclebin
 * @subpackage	system.cronjob
 * @category 	Community Framework
 */
class EmptyRecycleBinCronjob implements Cronjob {
	/**
	 * @see Cronjob::execute()
	 */
	public function execute($data) {
		if (GUESTBOOK_ENABLE_RECYCLE_BIN && GUESTBOOK_EMPTY_RECYCLE_BIN_CYCLE > 0) {
			
		}
	}
}
