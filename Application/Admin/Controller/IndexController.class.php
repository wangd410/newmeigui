<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
      public function __construct () {
            parent::__construct();
            if (!session('?login')&&!session('?type')) {
                  showMessage('请登录~',__MODULE__.'/login/index');
            }
      }
	
	public function index()
    {
          $this->assign('login',session('login'));
          $this->assign('type',session('type'));
          $this->display();
    }
    
    public function error () //没有操作权限时 返回空页面
    {
    	$this->display('index/empty');
    }
    
    public function _empty() //空操作
    {
    	showMessage('非法操作','index/error');
    }
}