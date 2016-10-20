<?php
namespace Home\Controller;

use Think\Controller;
header('Content-type:text/html;charset=UTF-8');

class AdMetailController extends Controller
{
    public function index ()
    {
          $adInfo = $this->get_ad_byid();
          $mostAd = $this->get_most_ad();
          $this->assign('info',$adInfo);
          $this->assign('most',$mostAd);
          var_dump($adInfo);
          //$this->go_url($adInfo[0]['na_ad_adtype']);
    }

      public function add_comment () { //发表评论操作
            $content = I('post.');
            $comment = D('Comment');
            $state = $this->get_user_state();
            if ($state['na_user_state']==1) {
                  $flag = $comment->add_comment($content);
                  if ($flag) {
                        echo "<script>location=document.referrer</script>";
                        //$this->redirect('AdMetail/index');//重定向到广告详情首页
                  }
            }else {
                  showMessage('您已经被禁言');
            }

      }

    private function get_ad_byid () { //根据ID获取广告信息
          $ad = D('Ad');
          $id = I('get.id');
          $ad->add_count($id);
          $data = $ad->get_ad_byid($id);
          return $data;
    }

    private function go_url ($type){ //根据广告类型判断跳转页面
          if ($type=='视频') {
                $this->display(v_info);
          } elseif ($type=='图文') {
                $this->display(p_info);
          }
    }

    private function get_most_ad () { //获取推荐列表广告
          $ad = D('Ad');
          $data = $ad->get_most_ad(5);
          return $data;
    }

    private function get_user_state () { //查询用户状态
          //session('user_id',5);
          $user = D('User');
          $state = $user->get_user_state();
          return $state;
    }
}