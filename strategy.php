<?php
//策略模式
interface Strategy{
    public function computePrice($price);
}

class GeneralMember implements Strategy{
    public function computePrice($price){
        return $price;
    }
}

class MiddleMember implements Strategy{
    public function computePrice($price){
        return $price * 0.8;
    }
}

class HighMember implements Strategy{
    public function computePrice($price){
        return $price * 0.7;
    }
}

class Price{
    private $strategyInstance;

    public function __construct(Strategy $instance){
        $this->strategyInstance = $instance;
    }

    public function computer($price){
        return $this->strategyInstance->computerPrice($price);
    }
}

// $p = new Price(new HighMember());
// $totalPrice = $p->computer(10000);
// echo $totalPrice;



//旅游策略
interface TravelStrategy{
    public function travelAlgorithm();
}
/**
 * 具体策略类(ConcreteStrategy)1：乘坐飞机
 */
class AirPlanelStrategy implements TravelStrategy {
    public function travelAlgorithm(){
        echo "travel by AirPlain", "<BR>\r\n";
    }
}
/**
 * 具体策略类(ConcreteStrategy)2：乘坐火车
 */
class TrainStrategy implements TravelStrategy {
    public function travelAlgorithm(){
        echo "travel by Train", "<BR>\r\n";
    }
}
/**
 * 具体策略类(ConcreteStrategy)3：骑自行车
 */
class BicycleStrategy implements TravelStrategy {
    public function travelAlgorithm(){
        echo "travel by Bicycle", "<BR>\r\n";
    }
}
/**
 *
 * 环境类(Context):用一个ConcreteStrategy对象来配置。维护一个对Strategy对象的引用。可定义一个接口来让Strategy访问它的数据。
 * 算法解决类，以提供客户选择使用何种解决方案：
 */
class PersonContext{
    private $_strategy = null;

    public function __construct(TravelStrategy $travel){
        $this->_strategy = $travel;
    }
    /**
     * 旅行
     */
    public function setTravelStrategy(TravelStrategy $travel){
        $this->_strategy = $travel;
    }
    /**
     * 旅行
     */
    public function travel(){
        return $this->_strategy ->travelAlgorithm();
    }
}

// 乘坐火车旅行
$person = new PersonContext(new TrainStrategy());
$person->travel();

// 改骑自行车
$person->setTravelStrategy(new BicycleStrategy());
$person->travel();


//运动策略
interface SportStrategy{
    public function playSport();
}
class FootballSpost implements SportStrategy{
    public function playSport(){
        echo 'playFootball';
    }
}
class BasketballSpost implements SportStrategy{
    public function playSport(){
        echo 'playBasketball';
    }
}
class Play{
    private $_strategy;
    public function __construct(SportStrategy $sport){
        $this->_strategy = $sport;
    }
    public function sport(){
        return $this->_strategy->playSport();
    }
}
$play = new Play(new FootballSpost());
$play->sport();

$play = new Play(new BasketballSpost());
$play->sport();




//饮食策略
interface EatStrategy{
    public function eatFood();
}
class eatMeatStrategy implements EatStrategy{
    public function eatFood(){
        echo 'eat meat!';
    }
}
class eatFruitStrategy implements EatStrategy{
    public function eatFood() {
        echo 'eat fruit!';
    }
}
class Eat{
    private $_strategy;
    public function __construct(EatStrategy $food){
        $this->_strategy = $food;
    }
    public function eatFood(){
        return $this->_strategy->eatFood();
    }
}
$eat = new Eat(new eatFruitStrategy());
$eat->eatFood();
