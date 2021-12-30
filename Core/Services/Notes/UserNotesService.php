<?php
namespace KMS\Notes;

require_once("./Core/Database/Database.php");

use KMS\Database\Database;

class UserNotes
{

  /** @var Database */
  private $db;

  public function __construct(){
    $this->db = new Database(HOST, DBUSER, DBPW, DB);
  }

  public function getUserNotes(int $userId){
    $notes = $this->db->dbQuery(
      "SELECT * FROM notes WHERE `user_id`=?",
      "i",
      [
        $userId
      ]
    );
    return $notes;
  }

  public function renderNote(array $note){
    echo "<h2>" . $note['title'] . "</h2>";
    echo "<p>" . $note['note'] . "</p>";
    echo "</br>";
  }

  public function renderNewNoteForm(int $userId){
    $form = "
    <h3>Add a New Note</h3>
    <form id='NewNote'>
    <input type='hidden' id='userId' name='userId' value=$userId>
    <label for='title'>title:</label><br>
    <input type='text' id='title' name='title'><br>
    <label for='text'>text:</label><br>
    <textarea type='textarea' id='note' name='note' rows='4' cols='50'></textarea><br><br>
    <input type='submit' value='Submit'>
    </form>";
    echo $form;
  }


}
