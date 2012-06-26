<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * Controls output of trashed guestbook entries.
 * 
 * @author	Stefan Hahn
 * @copyright	2012, Stefan Hahn
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.leon.wcf.user.guestbook.recyclebin
 * @subpackage	system.event.listener
 * @category 	Community Framework
 */
class UserGuestbookPageRecycleBinListener implements EventListener {
	/**
	 * @see EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {
		if (($eventObj->frame->getUserID() != WCF::getUser()->userID) || !GUESTBOOK_ENABLE_DELETED_ENTRY_NOTE || !WCF::getUser()->getPermission('mod.guestbook.canReadDeletedEntry')) {
			$eventObj->entryList->sqlConditions .= ' AND user_guestbook.isDeleted = 0';
		}
	}
}
