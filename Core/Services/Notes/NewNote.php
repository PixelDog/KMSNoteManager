<?php
require_once(__DIR__ . "/../../Database/Database.php");
use KMS\Database\Database;

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    die();
}

$db = new Database(HOST, DBUSER, DBPW, DB);

$userId = $_POST['userId'];
$title = $_POST['title'];
$note = $_POST['note'];

if(!$userId || !$title || !$note){
  die();
}

$query = "INSERT INTO notes (user_id, title, note)
VALUES (?, ?, ?)";

$db->dbInsert($query, "iss", [$userId, $title, $note]);

die();
