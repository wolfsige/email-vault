<?php

class Tests extends \PHPUnit\Framework\TestCase
{

  public function test_submit_to_database(): void
  {

    $submitForm = new SubmitForm();

    $name = "John Smith";
    $email = "Smithjohn@gmail.com";

    $result = $submitForm->isset($name, $email);

    $this->assertTrue($result);

  }

}