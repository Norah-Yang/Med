<?php
     header("Content-type:text/html;charset=utf-8");
    //1、接收前端的数据
    $medid = $_POST['medid'];
    $medname = $_POST['medname'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $mednum = $_POST['mednum'];
    $date = $_POST['date'];
    $action = $_POST['action'];
    $person = $_POST['person'];

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
        $sqlstr="select * from goods where medid='$medid'";//查询该用户名在数据库中有没有。 
        $result = mysql_query($sqlstr,$conn);
        $rows = mysql_num_rows($result);//获得结果的行数
        if($rows>0){
            //4)、关闭数据库
            mysql_close($conn);
            echo "-1";//用户名被使用
        }else{
            $sqlstr="insert into goods(medid,medname,type,price,detail,mednum,date) values('$medid','$medname','$type','$price','$detail','$mednum','$date')";
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
        }
    }
?>