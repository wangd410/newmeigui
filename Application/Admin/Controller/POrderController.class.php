<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/28
 * Time: 15:46
 */

namespace Admin\Controller;


use Think\Controller;

class POrderController extends Controller
{
    public  function __construct() {
        parent::__construct();
        if (!session('?login')&&!session('?type')) {
            showMessage('请登录~',__MODULE__.'/login/index');
        }
    }

    public function index () {//广告轮播页面
        $this->display('ao');
    }

    public function comment_o () {//广告评论页面
        $this->display('co');
    }

}