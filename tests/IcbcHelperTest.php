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
   public function 測試建立物件()
   {
      $data = array(
         'TranSerialNo' => '12345asfsadf',
         'orderid' => 'is order id',
         'merID' => 'is mer id',
         'merAcct' => 'is acct',
         'resultType' => 'is result type',
         'orderDate' => '20170102001122', //YYYYMMDDHHmmss
         'notifyDate' => '20170102001123',
         'tranStat' => '1', //訂單狀態1, 2, 3
         'comment' => '', //error code and msg
         'remark1' => '',
         'remark2' => '',
      );

      $helper = new IcbcHelper($data);

      $this->assertInstanceOf("IcbcHelper", $helper);
   }
}

