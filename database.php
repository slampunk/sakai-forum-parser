<?php

// The SQL to uninstall this tool
$DATABASE_UNINSTALL = array(
  "drop table if exists {$CFG->dbprefix}referencestudent",
  "drop table if exists {$CFG->dbprefix}referencegroups",
  "drop table if exists {$CFG->dbprefix}references",
  "drop table if exists {$CFG->dbprefix}referenceusage",
);

// The SQL to create the tables if they don't exist
$DATABASE_INSTALL = array(
  array( "{$CFG->dbprefix}referencestudent",
    "create table {$CFG->dbprefix}referencestudent (
      link_id     INTEGER NOT NULL,
      student_id     VARCHAR(50) NOT NULL,
      course_id   VARCHAR(50) NOT NULL,
      eid         VARCHAR(50),
      student_name VARCHAR(50),
      UNIQUE(link_id, student_id, course_id)
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8"
  ),
  array( "{$CFG->dbprefix}referencegroups",
    "create table {$CFG->dbprefix}referencegroups (
      id     INTEGER primary key auto_increment,
      student_id     VARCHAR(50) NOT NULL,
      group_id    VARCHAR(50) NOT NULL,
      group_name  VARCHAR(50) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8"
  ),
  array( "{$CFG->dbprefix}references_supplied",
    "create table {$CFG->dbprefix}references_supplied (
      id     INTEGER primary key auto_increment,
      reference_link     VARCHAR(255) NOT NULL,
      group_id    VARCHAR(50) NOT NULL,
      student_id     VARCHAR(50) NOT NULL,
      date_supplied  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8"
  ),
  array( "{$CFG->dbprefix}referenceusage",
    "create table {$CFG->dbprefix}referenceusage (
      id     INTEGER primary key auto_increment,
      reference_id     VARCHAR(255) NOT NULL,
      student_id     VARCHAR(50) NOT NULL,
      date_referenced  timestamp default current_timestamp,
      forum_id    INTEGER NOT NULL,
      topic_id    INTEGER NOT NULL,
      message_id  INTEGER NOT NULL,
      root_message_id INTEGER NOT NULL,
      reply_to INTEGER NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8"
  ),
);
