<?php

namespace KMS\Page;

require_once("./Core/Page/Page.php");

class HomePage extends Page
{

  public function intro(): string
  {
    return "Welcome to the " . $this->title . "!<br>";
  }

}
