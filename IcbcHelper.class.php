<?php

/**
 *
 */
class IcbcHelper
{
   const TOMCAT_URL = 'http://tomcat-icbc:8080/icbc/get_rev_sign.jsp';

   private $interfaceName = "";
   private $interfaceVersion = "";
   private $areaCode = "";
   private $curType = "";

   private $TranSerialNo = "";
   private $orderid = "";
   private $amount = "";
   private $merID = "";
   private $merAcct = "";
   private $resultType = "";
   private $orderDate = "";
   private $notifyDate = "";
   private $tranStat = "";
   private $comment = ""; //错误描述
   private $remark1 = ""; //备注
   private $remark2 = ""; //备注
   private $signMsg = "";

   public function __construct(array $datas)
   {
      foreach ($datas as $key => $value) {
         if (isset($this->{$key})) {
            $this->{$key} = $value;
         }
      }
   
      // 固定欄位
      $this->interfaceName = "ICBC_MYEBANK_B4C";
      $this->interfaceVersion = "3.0.0.0";
      $this->areaCode = "0119";
      $this->curType = "MOP";
   }

   private function createSingMsg()
   {
      //'signMsg'     => urlencode('c3X9vHKHIy/3GRvVOvR5ShEtUMBAJa4y5ACrMIrGiWsciPIkWVa7pmmlu8PYo17DgLJvi/kPZXm+XEPIoLzTADhV+393wIJ981+CbLlqiyKk8CwlniMUJP6qg3rTxbRJaGcITt1WE7WdY+ZkyzxCnYwzogCdua8mzQ/rn4dqihM=')
   }
}
