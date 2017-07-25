<?php
//分页类
class Page {
    public $pagesize;
    private $page;
    private $count;
    private $pageend;
    public $offset;
    private $listnum;
    private $action;
    public function __construct($count,$action='',$pagesize=5,$listnum=8) {
        $this->pagesize=$pagesize;
        $this->count=$count;
        $this->listnum=$listnum;
        $this->action=$action;
        $this->pageend=$this->getPageend();
        $this->page=!empty($_GET['page'])?$_GET['page']:1;
        $this->offset=$this->getOffset();
    }
    private function getPageend(){
        return ceil($this->count/$this->pagesize);
    }
    private function getOffset() {
        return ($this->page-1)*$this->pagesize;
    }
    public function showTime(){
        $pagestring='';
        $uprow=$this->page-1;
        $downrow=$this->page+1;
        $p='page';
        $uri=$_SERVER['REQUEST_URI'];
        $uridecode=parse_url($uri);
        if (!empty($this->action)) {
            $url=$uridecode['path']."?".($tihs->action)."&";
        }else {
            $url=$uridecode['path']."?";
        }
        if ($this->page>1) {
            $upstring="<a href='".$url."".$p."=".$uprow."'>上一页</a>";
        }else{
            $upstring="";
        }
        if ($this->page<$this->pageend) {
            $downstring="<a href='".$url."".$p."=".$downrow."'>下一页</a>";
        }else {
            $downstring="";
        }
        $hnum=ceil(($this->listnum)/2);
        $astring='';
        for ($i = $hnum; $i > 0; $i--) {
            $num=$this->page-$i;
            if($num>0){
                $astring.="<a href='".$url."".$p."=".$num."'>[".$num."]</a>";
            }
        }
        $astring.="&nbsp;".$this->page."&nbsp;";
        for($i=1;$i<=$hnum;$i++){
            $num=$this->page+$i;
            if ($num<=$this->pageend) {
                $astring.="<a href='".$url."".$p."=".$num."'>[".$num."]</a>";
            }
        }
        $nowPage="当前页&nbsp;".$this->page."/".$this->pageend."&nbsp;共".$this->count."条记录&nbsp;";
        $firstpage="<a href='".$url."".$p."=1'>首页</a>";
        $lastpage="<a href='".$url."".$p."=".$this->pageend."'>尾页</a>";
        $nowPage.=$firstpage;
        $pagestring.=$nowPage;
        $pagestring.=$upstring."-".$astring."-".$downstring;
        return $pagestring."&nbsp;".$lastpage;
    }
}
/*     $page = new Page(100,'',10,4);
    echo $page->showTime(); */