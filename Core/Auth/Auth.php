<?php

namespace KMS\Auth;
require_once("./Core/Database/Database.php");
require_once("./Core/Services/Notes/UserNotesService.php");

use KMS\Database\Database;
use KMS\Notes\UserNotes;

class Auth
{

  /** @var Database */
  private $db;

  /** @var UserNotes */
  private $userNotes;

  public function __construct(){
    $this->db = new Database(HOST, DBUSER, DBPW, DB);
    $this->userNotes = new UserNotes();
  }

  private function authenticate() {
      header('WWW-Authenticate: Basic realm="Authentication System"');
      header('HTTP/1.0 401 Unauthorized');
      echo "You must enter a valid login ID and password to access this resource\n";
      exit;
  }

   public function validate(){
     if (!isset($_SERVER['PHP_AUTH_USER'])) {
         $this->authenticate();
     } else {
        $user = $this->getUser();
        if(empty($user)){
          unset($_SERVER['PHP_AUTH_USER']);
          unset($_SERVER['PHP_AUTH_PW']);
          $this->authenticate();
        }
         echo "<p><h1>Hello " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "</h1></p>";
         $userNotes = $this->userNotes->getUserNotes($user[0]['id']);
         foreach($userNotes as $note){
           $this->userNotes->renderNote($note);
         }
         $this->userNotes->renderNewNoteForm($user[0]['id']);
     }
   }

   private function getUser(){
     $user = $this->db->dbQuery(
       "SELECT * FROM users WHERE `email`=? AND `password`=?",
       "ss",
       [
         $_SERVER['PHP_AUTH_USER'],
         $_SERVER['PHP_AUTH_PW']
       ]
     );

   return $user;

   }
}
