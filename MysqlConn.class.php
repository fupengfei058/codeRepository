<?php
//mysql方式连接数据库类
final class MysqlConn {
    private static $conn;
    private static $host="localhost";
    private static $root="root";
    private static $password="";
    private static $db="stu";

    function __construct(){
        self::$conn = mysql_connect(self::$host,self::$root,self::$password);
        if(!self::$conn){
            die("数据库连接失败！".mysql_error());
        }
        mysql_query("set names utf8");
        mysql_select_db(self::$db);
    }

    //查询操作
    public function excute_dql($sql){
        $res=mysql_query($sql) or die("数据查询失败".mysql_error());
        return $res;
    }

    //增删改操作
    public function excute_dml($sql){
        $res=mysql_query($sql) or die("数据操作失败".mysql_error());
        if(!$res){
            echo "数据操作失败";
        }
        else{
            if(mysql_affected_rows>0){
                echo "操作成功！";
            }
            else{
                echo "0行数据受影响！";
            }
        }
    }
}
/*     $mysqlConn = new MysqlConn();
    $sql = "select * from stu_info where id<10";
    $res = $mysqlConn->excute_dql($sql);
    while ($re = mysql_fetch_assoc($res)) {
    foreach ($re as $key => $value) {
        echo "--$value";
    }
        echo "<br>";
    } */