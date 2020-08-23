<?php
	header("Content-Type:text/html;charset=utf-8");
	$medid   = $_REQUEST['medid'];
	$mednum   = $_REQUEST['mednum'];
	
	//2、数据保存在数据库中
	//1）、建立连接（搭桥）
	$conn = mysql_connect("localhost","root","root");
	
	//2）、选择数据库（找目的地）
	if(!mysql_select_db("med",$conn)){
		die("数据库选择失败".mysql_error());
	};
	
	//3）、传输数据（过桥）
	$sqlstr = "update goods set mednum='$mednum' where medid='$medid'";
	$result = mysql_query( $sqlstr,$conn);
    //4)、关闭数据库
    mysql_close($conn);
        //3、响应
    if($result!=1){
        echo "0";//失败
    }else{
        echo "1";//成功
    }
?>
