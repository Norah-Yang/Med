<?php
	header("Content-Type:text/html;charset=utf-8");
	$userid   = $_REQUEST['userid'];
	$sex   = $_REQUEST['changeSex'];
	$age   = $_REQUEST['changeAge'];
	$userTel   = $_REQUEST['changeTel'];
	
	//2、数据保存在数据库中
	//1）、建立连接（搭桥）
	$conn = mysql_connect("localhost","root","root");
	
	//2）、选择数据库（找目的地）
	if(!mysql_select_db("med",$conn)){
		die("数据库选择失败".mysql_error());
	};
	
	//3）、传输数据（过桥）
	$sqlstr = "update user set sex='$sex',age='$age',userTel='$userTel' where userid='$userid'";
	$result = mysql_query( $sqlstr,$conn);
    //4)、关闭数据库
    mysql_close($conn);
        //3、响应
    if($result!=1){
        echo "0";//注册失败用0
    }else{
        echo "1";//注册成功用1
    }
?>
