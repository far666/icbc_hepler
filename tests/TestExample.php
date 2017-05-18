<?php

use PHPUnit\Framework\TestCase;

class IcbcHelperTest extends TestCase
{
   //before test
   public function setUp()
   {
      //set test data
   }

   //after test
   public function tearDown()
   {
      //clean test data
   }

   /**
    * @test
    *
    */
   public function newObject()
   {
      $data = array();
      $helper = new IcbcHelper();
      print_r($helper);
   }
}

