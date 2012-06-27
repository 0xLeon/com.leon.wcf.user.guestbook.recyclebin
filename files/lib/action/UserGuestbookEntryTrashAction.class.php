<?php
// wcf imports
require_once(WCF_DIR.'lib/action/AbstractUserGuestbookEntryAction.class.php');

/**
 * Trashs a guestbook entry.
 * 
 * @author	Stefan Hahn
 * @copyright	2012, Stefan Hahn
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.leon.wcf.user.guestbook.recyclebin
 * @subpackage	action
 * @category 	Community Framework
 */
class UserGuestbookEntryTrashAction extends AbstractUserGuestbookEntryAction {
	/**
	 * @see Action::readParameters()
	 */
	public function readParameters() {
		parent::readParameters();
		
		if (!GUESTBOOK_ENABLE_RECYCLE_BIN || $this->entry->isDeleted) {
			throw new IllegalLinkException();
		}
		
		if (WCF::getUser()->getPermission('mod.guestbook.canTrashEntry')) {
			throw new PermissionDeniedException();
		}
	}
	
	/**
	 * @see Action::execute()
	 */
	public function execute() {
		$sql = "UPDATE	wcf".WCF_N."_user_guestbook
			SET	isDeleted = 1,
				deleteTime = ".TIME_NOW.",
				deletedBy = '".escapeString(WCF::getUser()->username)."'
				deletedByID = ".WCF::getUser()->userID."
				commentIsDeleted = 1,
				commentDeleteTime = ".TIME_NOW.",
				commentDeletedBy = '".escapeString(WCF::getUser()->username)."'
				commentDeletedByID = ".WCF::getUser()->userID."
			WHERE	entryID = ".$eventObj->entry->entryID;
		WCF::getDB()->sendQuery($sql);
		
		$this->executed();
		
		HeaderUtil::redirect('index.php?page=UserGuestbook&userID='.$this->entry->ownerID.'&entryID='.$this->entry->entryID.SID_ARG_2ND_NOT_ENCODED.'#entry'.$this->entry->entryID);
		exit;
	}
}
