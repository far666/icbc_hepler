<?php
error_reporting(0);

$debug = true;

require_once('IcbcHelper.class.php');

$tomcatUrl = 'http://tomcat-icbc:8080/icbc/get_rev_sign.jsp';

/*
$postData = array(	'interfaceName' 	=> 'ICBC_MYEBANK_B2C',
					'interfaceVersion'	=> '3.0.0.0',
					'areaCode'			=> '0119',
					'TranSerialNo'		=> 'HFG000000000000000041533',
					'orderid'			=> '201606071522162989',
					'amount'			=> '100',
					'curType'			=> 'MOP',
					'merID'				=> '0119EC20000161',
					'merAcct'			=> '0108000400000010132',
					'resultType'		=> '1',
					'orderDate'			=> '20160607152216',
					'notifyDate'		=> '20160607152019',
					'tranStat'			=> '1',
					'comment'			=> '',
					'remark1'			=> 'remark1value',
					'remark2'			=> 'remark2vale',
					'signMsg'			=> urlencode('c3X9vHKHIy/3GRvVOvR5ShEtUMBAJa4y5ACrMIrGiWsciPIkWVa7pmmlu8PYo17DgLJvi/kPZXm+XEPIoLzTADhV+393wIJ981+CbLlqiyKk8CwlniMUJP6qg3rTxbRJaGcITt1WE7W
dY+ZkyzxCnYwzogCdua8mzQ/rn4dqihM=')
				);
*/

/*
	before posting the value to jsp, we need to do urlencode for all value
*/
foreach ($_POST as $k => $v) {
	$postData[$k] = urlencode($v);
}


$postResult = trim(IcbcHelper::httpPost($tomcatUrl, $postData));

$result = json_decode($postResult);


/* the value of $verifyResult are
	0: failed 1:exception 2:exception 3: passed
*/
$verifyResult = $result->sign_result;
$rawPostData = $result->post_data;
$orginalSign = $result->post_sign;

/*
在这里加入你的代码，判断$verifyResult进行操作，例如数据库操作，生成完成后跳转的$jumpUrl

*/



// in debug mode, put result of the jsp in log file
if ($debug) {

	$log = '/home/hellomacau/web/logs/icbc_rev.log';

	file_put_contents($log, date('YmdHis').': '.$postResult."\n", FILE_APPEND);

}

// redirect url
$jumpUrl = 'http://www.icbc.com.mo';

//echo $postResult;
echo "HTTP/1.1 200 OK\nServer: Apache/1.39\nContent-Length: ".strlen($jumpUrl)."\nContent-type: text/html\n\n$jumpUrl";
?>