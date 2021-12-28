<?php

namespace KMS\Database;

class Database
{


  /** @var string */
  private $hostName;

  /** @var string */
  private $userName;

  /** @var string */
  private $passWord;

  /** @var string */
  private $db;

  /** $var mysqli */
  public $conn;

  public function __construct(
    string $hostName,
    string $userName,
    string $passWord,
    string $db
    )
  {
    $this->hostName = $hostName;
    $this->userName = $userName;
    $this->passWord = $passWord;
    $this->db = $db;
    $this->connect();
  }

  /**
   * Create DB connection
   */
  private function connect()
  {
    // Create connection
    $this->conn = new \mysqli($this->hostName, $this->userName, $this->passWord, $this->db);

    // Check connection
    if ($this->conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  }

  /*
   * query the Database
   * @param string $query
   * @param array $substitutions
   * @return array
   */
   public function dbQuery(string $query, array $substitutions): array
   {
     $statement = $this->conn->prepare($query);

     if(!empty($substitutions)){
       foreach($substitutions as $substitution ){
         $statement->bind_param($substitution['type'], $substitution['value']);
       }
     }
     $statement->execute();
     $result = $statement->get_result(); // get the mysqli result

     // loop through results:
     $queryResults = [];
     while($row = $result->fetch_assoc()) {
       $queryResults[] = $row;
     }

     return $queryResults;
   }

}
