<?php
//命令链模式
interface MyCommand{
    public function onCommand( $name, $args );
}

//user register
class Register{
    private $_commandsChain = array();

    public function addCommand( $cmd ){
        $this->_commandsChain[] = $cmd;
    }

    public function runCommand( $name, $args ){
        foreach( $this->_commandsChain as $cmd ){
            if ($cmd->onCommand( $name, $args )) {
                return;
            }
        }
    }
}

//common logic
class CommonCommand implements MyCommand{
    public function onCommand( $name, $args ){
        if ($name != 'common_user' ) {
            return false;
        }
        echo "I am common member\n";
        return true;
    }
}

//vip logic
class VipCommand implements MyCommand{
    public function onCommand( $name, $args ){
        if ($name != 'vip_user') {
            return false;
        }
        echo "I am vip member\n";
        return true;
    }
}

//实例化注册器
$cc = new Register();
//运行普通用户的处理逻辑
$cc->addCommand( new CommonCommand() );
//运行高级用户的处理逻辑
$cc->addCommand( new VipCommand() );
//运行普通用户的处理逻辑
$cc->runCommand( 'common_user', null );
//运行高级用户的处理逻辑
$cc->runCommand( 'vip_user', null );