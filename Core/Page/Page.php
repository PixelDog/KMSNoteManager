<?php

namespace KMS\Page;

abstract class Page
{

  /**@var string */
  public $title;

  public function __construct(string $title) {
    $this->title = $title;
  }

  abstract public function intro(): string;

  public function userWasHere(string $user): string
  {
    return "<br>" . $user . " was here!<br>";
  }

}
