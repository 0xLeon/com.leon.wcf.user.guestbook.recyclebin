<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * Handles user guestbook entry recycle bin during deletion
 * 
 * @author	Stefan Hahn
 * @copyright	2012, Stefan Hahn
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.leon.wcf.user.guestbook.recyclebin
 * @subpackage	system.event.listener
 * @category 	Community Framework
 */
class UserGuestbookEntryDeleteActionRecycleBinListener implements EventListener {
	/**
	 * @see EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {
		if (GUESTBOOK_ENABLE_RECYCLE_BIN && !$eventObj->entry->isDeleted) {
			$sql = "UPDATE	wcf".WCF_N."_user_guestbook
				SET	isDeleted = 1
				WHERE	entryID = ".$eventObj->entry->entryID;
			WCF::getDB()->sendQuery($sql);
			
			$eventObj->executed();
			
			HeaderUtil::redirect('index.php?page=UserGuestbook&userID='.$eventObj->entry->ownerID.'&entryID='.$eventObj->entry->entryID.SID_ARG_2ND_NOT_ENCODED.'#entry'.$eventObj->entry->entryID);
			exit;
		}
	}
}
