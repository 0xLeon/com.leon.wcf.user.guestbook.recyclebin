<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
require_once(WCF_DIR.'lib/action/UserGuestbookCommentTrashAction.class.php');

/**
 * Handles user guestbook entry recycle bin during comment deletion
 * 
 * @author	Stefan Hahn
 * @copyright	2012, Stefan Hahn
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.leon.wcf.user.guestbook.recyclebin
 * @subpackage	system.event.listener
 * @category 	Community Framework
 */
class UserGuestbookCommentDeleteActionRecycleBinListener implements EventListener {
	/**
	 * @see EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {
		if (GUESTBOOK_ENABLE_RECYCLE_BIN && !$eventObj->entry->commentIsDeleted && WCF::getUser()->getPermission('mod.guestbook.canTrashEntry')) {
			new UserGuestbookCommentTrashAction();
		}
	}
}
