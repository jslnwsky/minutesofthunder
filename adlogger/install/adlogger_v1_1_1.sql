CREATE TABLE IF NOT EXISTS `adlog_adblock` (
  `id` int(11) NOT NULL auto_increment,
  `date` date NOT NULL default '0000-00-00',
  `time` time NOT NULL default '00:00:00',
  `visitor_ip` varchar(15) NOT NULL default '',
  `displaypage_url` text NOT NULL,
  `reason` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `adlog_channels` (
  `id` int(10) NOT NULL auto_increment,
  `chan_name` varchar(50) NOT NULL default '',
  `chan_desc` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `adlog_logfiles` (
  `id` int(12) NOT NULL auto_increment,
  `entry_type` varchar(10) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  `time` time NOT NULL default '00:00:00',
  `timestamp` varchar(12) NOT NULL default '',
  `visitor_ip` varchar(15) NOT NULL default '',
  `visitor_hostname` varchar(250) NOT NULL default '',
  `visitor_agent` varchar(250) NOT NULL default '',
  `adlogger_channel_id` varchar(15) NOT NULL default '',
  `displaypage_url` text NOT NULL,
  `displaypage_ref` text NOT NULL,
  `ad_targ_url` text NOT NULL,
  `ad_format` varchar(25) NOT NULL default '',
  `ad_type` varchar(20) NOT NULL default '',
  `ad_channel` varchar(25) NOT NULL default '',
  `ad_bord_color` varchar(8) NOT NULL default '',
  `ad_bg_color` varchar(8) NOT NULL default '',
  `ad_link_color` varchar(8) NOT NULL default '',
  `ad_url_color` varchar(8) NOT NULL default '',
  `ad_text_color` varchar(8) NOT NULL default '',
  `search_term` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `adlog_users` (
  `id` int(5) NOT NULL auto_increment,
  `username` varchar(25) NOT NULL default '',
  `password` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
