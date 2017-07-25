<?php
//PDO方式连接数据库类
final class PdoConn {
    public $pdo=null;
    public $stmt;
    function __construct(){
        try {
            $this->pdo=new PDO("mysql:host=127.0.0.1;dbname=stu",'root','');
            $this->pdo->query('set names utf8');
        } catch (PDOException $e) {
            die($e.getMessage());
        }
    }
    public function execute_dql($sql){
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute();
        $array=array();
        while ($arr = $this->stmt->fetchAll(PDO::FETCH_ASSOC)){
            $array[] = $arr;
        }
        return $array;
    }
}
/*     header("Content-type:text/html;charset=utf-8");
    $pdoConn = new PdoConn();
    $sql = "select name from stu_info where id<10";
    $re = $pdoConn->execute_dql($sql);
    var_dump($re); */