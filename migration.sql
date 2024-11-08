ALTER TABLE `article`
    ADD `views` INTEGER NOT NULL DEFAULT 0 AFTER `content`;