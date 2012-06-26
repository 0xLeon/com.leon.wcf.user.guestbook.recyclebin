ALTER TABLE wcf1_user_guestbook ADD COLUMN isDeleted TINYINT(1) NOT NULL DEFAULT 0 AFTER time;
ALTER TABLE wcf1_user_guestbook ADD COLUMN deleteTime INT(10) NOT NULL DEFAULT 0 AFTER isDeleted;
ALTER TABLE wcf1_user_guestbook ADD COLUMN deletedBy VARCHAR(255) NOT NULL DEFAULT '' AFTER deleteTime;
ALTER TABLE wcf1_user_guestbook ADD COLUMN deletedByID INT(10) NOT NULL DEFAULT 0 AFTER deletedBy;
ALTER TABLE wcf1_user_guestbook ADD COLUMN deleteReason TEXT AFTER deletedByID;
