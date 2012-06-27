ALTER TABLE wcf1_user_guestbook ADD COLUMN isDeleted TINYINT(1) NOT NULL DEFAULT 0 AFTER time;
ALTER TABLE wcf1_user_guestbook ADD COLUMN deleteTime INT(10) NOT NULL DEFAULT 0 AFTER isDeleted;
ALTER TABLE wcf1_user_guestbook ADD COLUMN deletedBy VARCHAR(255) NOT NULL DEFAULT '' AFTER deleteTime;
ALTER TABLE wcf1_user_guestbook ADD COLUMN deletedByID INT(10) NOT NULL DEFAULT 0 AFTER deletedBy;
ALTER TABLE wcf1_user_guestbook ADD COLUMN deleteReason TEXT AFTER deletedByID;

ALTER TABLE wcf1_user_guestbook ADD COLUMN commentIsDeleted TINYINT(1) NOT NULL DEFAULT 0 AFTER commentTime;
ALTER TABLE wcf1_user_guestbook ADD COLUMN commentDeleteTime INT(10) NOT NULL DEFAULT 0 AFTER commentIsDeleted;
ALTER TABLE wcf1_user_guestbook ADD COLUMN commentDeletedBy VARCHAR(255) NOT NULL DEFAULT '' AFTER commentDeleteTime;
ALTER TABLE wcf1_user_guestbook ADD COLUMN commentDeletedByID INT(10) NOT NULL DEFAULT 0 AFTER commentDeletedBy;
ALTER TABLE wcf1_user_guestbook ADD COLUMN commentDeleteReason TEXT AFTER commentDeletedByID;
