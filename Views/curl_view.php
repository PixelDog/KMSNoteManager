<?php

/**
* The curl page view
*/
class CurlView
{

  private $modelObj;

  private $controller;

  function __construct($controller, $model)
  {
    $this->controller = $controller;

    $this->modelObj = $model;

  }

  public function json()
  {
    $userId = $_GET['userId'];
    return $this->modelObj->getJson($userId);
  }

  public function fetchData()
  {
    return $this->modelObj->fetchData();
  }

  public static function Core(){

  }

}
