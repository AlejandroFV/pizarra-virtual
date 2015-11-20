<?php

/**
 * Class User
 */
class User
{
  /**
   * @var String
   */
  private $id;

  /**
   * Usuario constructor.
   */
  public function __construct() {}

  /**
   * @return String
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param String $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  
}