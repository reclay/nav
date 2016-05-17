<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
      $site=M('site');
      $re=$site->select();
      //var_dump($re);
      $i=0;
      foreach ($re[0] as $key => $value) {
        $k[$i]= $key;
        $i++;
      }
      //var_dump($k);
      $this->assign('key',$k);
      $this->assign('list',$re);
      $this->display();
    }
}
