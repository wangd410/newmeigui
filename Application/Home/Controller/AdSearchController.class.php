<?php
/**
 * Created by PhpStorm.
 * User: wangd
 * Date: 2016/10/17
 * Time: 13:35
 */
namespace Home\Controller;
use Think\Controller;

class AdSearchController extends  Controller
{
      public function index () {
            $adtype = D("Adtype");
            $typeList = $adtype->get_adType();
            $this->assign('typeList',$typeList);
            $this->display(adSearch);
      }
}

