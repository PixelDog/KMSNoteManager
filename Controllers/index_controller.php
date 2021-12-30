<?php
require_once(__DIR__ . "/../Core/Auth/Auth.php");
use KMS\Auth\Auth;
/**
* The home page controller
*/
class IndexController
{
  private $model;

  function __construct($model)
  {
    $this->model = $model;
  }

  public function auth()
  {

    $auth = new Auth();
    $auth->validate();

    // return $this->model->auth();
  }

}
