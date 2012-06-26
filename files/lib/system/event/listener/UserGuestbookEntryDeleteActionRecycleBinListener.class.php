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
		
	}
}
