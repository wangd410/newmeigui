<?php
/**
 * Created by PhpStorm.
 * User: wangd
 * Date: 2016/10/21
 * Time: 12:20
 */

namespace Home\Controller;


use Think\Controller;
use Think\Verify;
class LoginController extends Controller
{
      public function index () {
            $this->display(login);
      }

      public function verify_c () {
            ob_end_clean();
            $config = array(
                  'fontsize'=>10,
                  'length'=>4,
                  'useNoise'=>false,
                  'codeSet'=>'1234567890',
            );
            $Verify = new Verify($config);
            $Verify->entry();
      }

     public function res_user () { //显示注册页面
           $this->display(re);
     }

     public function res_check () {
           $verify = I('param.verify','');
           if(!check_verify($verify)){
                 showMessage('验证码错误');
           }
           $user = D('User');
           $data = I('post.');
           $this->pwd_again($data['na_user_pwd'],$data['na_user_pwd1']);
           $this->loginname_again ($data['na_user_loginName']);
           $flag = $user->add_user($data);
           if ($flag) {
                 showMessage('注册成功',"__MODULE__/Login");
           }
     }

     private function pwd_again ($a,$b) {//判断两次输入密码是否不一致
           set_error_handler("custom_error");
           if ($a!=$b) {
                 trigger_error(showMessage('两次密码输入不一致!'),E_USER_ERROR);
           }
     }

     private function loginname_again ($username) { //判断用户名是否存在
           set_error_handler("custom_error");
           $user = D('User');
           $data = $user->get_loginname($username);
           if ($data!=null) {
                 trigger_error(showMessage('该手机号已被注册，请重新输入！'),E_USER_ERROR);
           }
     }
}