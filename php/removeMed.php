<?php
	header("Content-Type:text/html;charset=utf-8");
	$medid   = $_REQUEST['medid'];
	$date   = $_REQUEST['date'];
	$action   = $_REQUEST['action'];
	$person   = $_REQUEST['person'];
	
	//2、数据保存在数据库中
	//1）、建立连接（搭桥）
	$conn = mysql_connect("localhost","root","root");
	
	//2）、选择数据库（找目的地）
	if(!mysql_select_db("med",$conn)){
		die("数据库选择失败".mysql_error());
	};
	
	//3）、传输数据（过桥）
	$sqlstr = "delete from goods where medid='$medid'";
	$result = mysql_query( $sqlstr,$conn);
        //3、响应
    if($result!=1){
		//4)、关闭数据库
		mysql_close($conn);
        echo "0";//失败用0
    }else{
		//添加至log中
		$sqlstr_log="insert into log(medid,date,person,action) values('$medid','$date','$person','$action')";
		$result_log = mysql_query( $sqlstr_log,$conn);
		mysql_close($conn);
        echo "1";//成功用1
    }
?>
