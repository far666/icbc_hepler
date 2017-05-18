<?php

use PHPUnit\Framework\TestCase;

class IcbcHelperTest extends TestCase
{
   //before test
   public function setUp()
   {
      //set test data
      $this->test_data =  array(
         'TranSerialNo' => 'HFG000000000000000041533',
         'orderid' => '201606071522162989',
         'amount' => '100',
         'merID' => '0119EC20000161',
         'merAcct' => '0108000400000010132',
         'resultType' => '1',
         'orderDate' => '20160607152216', //YYYYMMDDHHmmss
         'notifyDate' => '20160607152019',
         'tranStat' => '1', //訂單狀態1, 2, 3
         'comment' => '', //error code and msg
         'remark1' => 'aa',
         'remark2' => 'bb',
      );
   }

   //after test
   public function tearDown()
   {
      //clean test data
   }

   /**
    * @test
    */
   public function 測試建立物件()
   {
      $helper = new IcbcHelper($this->test_data);
      $this->assertInstanceOf("IcbcHelper", $helper);
   }

   /**
    * @test
    */
   public function getPostDatas()
   {
      $exceped_datas = array(
         'interfaceName' => 'ICBC_MYEBANK_B4C',
         'interfaceVersion' => '3.0.0.0',
         'areaCode' => '0119',
         'curType' => 'MOP',
         'TranSerialNo' => 'HFG000000000000000041533',
         'orderid' => '201606071522162989',
         'amount' => '100',
         'merID' => '0119EC20000161',
         'merAcct' => '0108000400000010132',
         'resultType' => '1',
         'orderDate' => '20160607152216',
         'notifyDate' => '20160607152019',
         'tranStat' => '1',
         'comment' => '', 
         'remark1' => 'aa',
         'remark2' => 'bb',
         'signMsg' => '',
      );
      
      $helper = new IcbcHelper($this->test_data);
      $datas = $helper->getPostDatas();
      
      $this->assertSame($exceped_datas, $datas);
   }
}

