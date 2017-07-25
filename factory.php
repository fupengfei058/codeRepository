<?php
//工厂模式
interface IUser{
    public function getName();
}
class User1 implements IUser{
    public function getName(){
        return 'Jack';
    }
}
class User2 implements IUser{
    public function getName(){
        return 'Tom';
    }
}
class UserFactory{
    public static function create($id){
        switch($id){
            case 1:return new User1();
            case 2:return new User2();
        }
    }
}
$user = UserFactory::create(2);
echo $user->getName();