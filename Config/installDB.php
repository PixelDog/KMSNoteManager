<?php

/**
 * Create and install the DB with sample content
 *
 */

require "_config.php";
require "../Core/Database/Database.php";
use KMS\Database\Database;

$sql = file_get_contents("kms_notes.sql");

$db = new Database(HOST, DBUSER, DBPW, DB);

$db->dbSampleInstall($sql);
