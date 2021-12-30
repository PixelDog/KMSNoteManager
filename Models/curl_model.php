<?php
require_once(__DIR__ . "/../Core/Services/Curl/CurlService.php");
require_once(__DIR__ . "/../Core/Database/Database.php");

use KMS\Curl\CurlService;
use KMS\Database\Database;

/**
* The curl page model
*/
class CurlModel
{
  /** @var Database */
  private $db;

  /** @var UserNotes */
  private $userNotes;

  public function __construct(){
    $this->db = new Database(HOST, DBUSER, DBPW, DB);
  }

  /**
  * @param mixed $userID
  */
  public function getJson($userId)
  {
    $curlMe = new CurlService(
      "http://localhost:8080/KMSNotes/curl/fetchData", // url
      ["userId" => $userId], // url params
      [ // curl opts
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => [
          "Accept: application/json",
        ]
      ]
    );

    $json = $curlMe->load();
    if(empty($json)){
      return "[{}]";
    }
    return $json;
  }

  public function fetchData(){
    $userId = $_GET['userId'];
    if(empty($userId)){
      return  '[{"fail":"You must supply a userId"}]';
    }
    $notes = $this->db->dbQuery(
      "SELECT * FROM notes WHERE `user_id`=?",
      "i",
      [
        $userId
      ]
    );
    $encoded = json_encode($notes, JSON_UNESCAPED_SLASHES);
    echo $encoded;
    return $encoded;
  }

}
