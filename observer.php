<?php
//观察者模式
interface Subject{
    public function register(Observer $observer);
    public function notify();
}
interface Observer{
    public function watch();
}
class Action implements Subject{
    public $_observers = array();
    public function register(Observer $observer){
        $this->_observers[] = $observer;
    }
    public function notify(){
        foreach($this->_observers as $observer){
            $observer->watch();
        }
    }
}
class Cat implements Observer{
    public function watch(){
        echo 'Cat watches TV';
    }
}
class Dog implements Observer{
    public function watch(){
        echo 'Dog watches TV';
    }
}
$action = new Action();
$action->register(new Cat());
$action->register(new Dog());
$action->notify();