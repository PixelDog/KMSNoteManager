<?php

/**
* The home page view
*/
class IndexView
{

  private $model;

  private $controller;

  private $html;

  function __construct($controller, $model)
  {
    $this->controller = $controller;

    $this->model = $model;

    $html = file_get_contents(__DIR__ ."/../Core/Templates/Head.html");

    $html .= file_get_contents(__DIR__."/../Core/Templates/Foot.html");

    echo $html;
  }

  public function index()
  {
    return $this->controller->auth();
  }

}
