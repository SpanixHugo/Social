<?php 

class AppException extends Exception {
  public $message;
  public $type;

  public function __construct($message, $type = "error") {
    $this->message = $message;
    $this->type = $type;
  }
}