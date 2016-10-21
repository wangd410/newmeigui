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
     /* public function test() {
            $verify = I('param.verify','');
            if(!check_verify($verify)){
                  showMessage('验证失败');
            }
      }*/
}