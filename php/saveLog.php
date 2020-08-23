<?php
     header("Content-type:text/html;charset=utf-8");
    //1、接收前端的数据
    $medid = $_POST['medid'];
    $date = $_POST['date'];
    $person = $_POST['person'];
    $action = $_POST['action'];

    //2、处理
    //1)、链接数据库(搭桥)
    $conn = mysql_connect("localhost","root","root");

    if(!$conn){
        echo("数据库出错".mysql_error());
    }else{
        //2)、选择库（选择目的地）
        mysql_select_db("med",$conn);

        //3)、执行SQL语句（数据传输）
        //3.1)
        $sqlstr="insert into log(medid,date,person,action) values('$medid','$date','$person','$action')";
        $result = mysql_query( $sqlstr,$conn);
        //4)、关闭数据库
        mysql_close($conn);
            //3、响应
        if($result!=1){
            echo "0";//失败用0
        }else{
            echo "1";//成功用1
        }
        
    }
?>