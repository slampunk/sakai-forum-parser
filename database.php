<?php

// The SQL to uninstall this tool
$DATABASE_UNINSTALL = array(
  "drop table if exists {$CFG->dbprefix}referenceuser",
  "drop table if exists {$CFG->dbprefix}referencegroups",
  "drop table if exists {$CFG->dbprefix}references",
  "drop table if exists {$CFG->dbprefix}referenceusage",
);

// The SQL to create the tables if they don't exist
$DATABASE_INSTALL = array(
  array( "{$CFG->dbprefix}referenceuser",
    "create table {$CFG->dbprefix}referenceuser (
      link_id     INTEGER NOT NULL,
      user_id     INTEGER NOT NULL,

      UNIQUE(link_id, user_id)
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8"
  )
);

