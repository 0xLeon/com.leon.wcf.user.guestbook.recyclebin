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
			// delete trashed entries
			$sql = "SELECT	entryID
				FROM	wcf".WCF_N."_user_guestbook
				WHERE	isDeleted = 1
					AND deleteTime < ".(TIME_NOW - GUESTBOOK_EMPTY_RECYCLE_BIN_CYCLE * 86400);
			$result = WCF::getDB()->sendQuery($sql);
			if (WCF::getDB()->countRows($result) > 0) {
				$entryIDs = '';
				while ($row = WCF::getDB()->fetchArray($result)) {
					if (!empty($threadIDs)) $entryIDs .= ',';
					$entryIDs .= $row['entryID'];
				}
				
				$sql = "DELETE
					FROM	wcf".WCF_N."_user_guestbook
					WHERE	entryID in (".$entryIDs.")";
				WCF::getDB()->registerShutdownQuery($sql);
				
				$sql = "DELETE
					FROM	wcf".WCF_N."_user_guestbook_hash
					WHERE	entryID in (".$entryIDs.")";
				WCF::getDB()->registerShutdownQuery($sql);
			}
			
			// deleted trashed entry comments
			$sql = "UPDATE	wcf".WCF_N."_user_guestbook
				SET	comment = '',
					commentTime = 0,
					commentIsDeleted = 0,
					commentDeleteTime = 0,
					commentDeletedBy = '',
					commentDeletedByID = 0
				WHERE	commentIsDeleted = 1
					AND commentDeleteTime < ".(TIME_NOW - GUESTBOOK_EMPTY_RECYCLE_BIN_CYCLE * 86400);
			WCF::getDB()->registerShutdownQuery($sql);
		}
	}
}
