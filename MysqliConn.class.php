<?php
//mysqli方式连接数据库类
final class MysqliConn {
    private $mysqli;
    private static $host="localhost";
    private static $root="root";
    private static $password="";
    private static $db="stu";

    function __construct(){
        $this->mysqli=new MySQLi(self::$host,self::$root,self::$password,self::$db);
        if(!$this->mysqli){
            die("数据库连接失败！".$this->mysqli->connect_error);
        }
        $this->mysqli->query("set names utf8");
    }

    //查询操作
    public function excute_dql($sql){
        $res=$this->mysqli->query($sql) or die("数据查询失败".$this->mysqli->error);
        return $res;
    }

    //增删改操作
    public function excute_dml($sql){
        $res=$this->mysqli->query($sql) or die("数据操作失败".$this->mysqli->error);
        if(!$res){
            echo "数据操作失败";
        }
        else{
            if($this->mysqli->affected_rows>0){
                echo "操作成功！";
            }
            else{
                echo "0行数据受影响！";
            }
        }
    }
}
/*     $mysqliConn = new MysqliConn();
    $sql = "select * from stu_info where id<10";
    $res = $mysqliConn->excute_dql($sql);
    while ($re = $res->fetch_assoc()) {
        foreach ($re as $key => $value) {
            echo "--$value";
        }
        echo "<br>";
    } */