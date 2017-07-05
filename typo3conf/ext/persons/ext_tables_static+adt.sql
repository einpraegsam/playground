#
# Table structure for table 'tx_wtgenderfromfirstname_table'
#
DROP TABLE IF EXISTS tx_wtgenderfromfirstname_table;
CREATE TABLE tx_wtgenderfromfirstname_table (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	firstname tinytext,
	gender tinytext,

	PRIMARY KEY (uid),
	KEY parent (pid)
);


INSERT INTO `tx_wtgenderfromfirstname_table` VALUES (2, 0, 0, 0, 0, 0, 0, 'Aad', 'M');
INSERT INTO `tx_wtgenderfromfirstname_table` VALUES (3, 0, 0, 0, 0, 0, 0, 'Aadam', 'M');
