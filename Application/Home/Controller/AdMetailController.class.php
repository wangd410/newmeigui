<?php
namespace Home\Controller;

use Org\Net\Http;
use Think\Controller;
use Org\net;
header('Content-type:text/html;charset=UTF-8');

class AdMetailController extends Controller
{
    public function index ()
    {
          $id = I('get.id');
          $this->_empty($id);
          $user_id = session('user_id');
          $adInfo = $this->get_ad_byid($id);
          $this->assign('info',$adInfo);
          $data = $this->get_comment($id);
          $this->assign('user_id',$user_id);
          $this->assign('comment',$data['list']);
          $this->assign('page',$data['page']);
          $this->go_url($adInfo['na_ad_adtype']);
    }

    public function _before_add_comment () {//前置操作，判断用户是否登录
        if (!isset($_SESSION['user_id'])||session('user_id')==null) {
            session('request_url',I('post.now_url'));
            echo showMessage('请登录！',__MODULE__.'/Index');
            exit();
        }
    }

    public function add_comment () { //发表评论操作
            set_error_handler("custom_error");
            $content = $_POST;
            if ($content['na_comment_content']==null) {
                  trigger_error(showMessage('请输入评论信息'),E_USER_ERROR);
            }
            $comment = D('Comment');
            $state = $this->get_user_state();
            if ($state['na_user_state']==1) {
                  $flag = $comment->add_comment($content);
                  if ($flag) {
                        showMessage('发表成功');
                        //$this->redirect('AdMetail/index');//重定向到广告详情首页
                  }
            }else {
                  showMessage('您已经被禁言');
            }

      }

      public function search_ad () { //搜索操作
            $data = $this->get_ad_byname();
            if ($data==null) {
                  showMessage('该广告信息不存在！');
            }else {
                  redirect("AdMetail/index/id/{$data['na_ad_id']}",0);
            }
      }

      public function love_do () { //点赞
            $love = D('Adlove');
            $id = $_POST['id'];
            if (session('love_id')==session('user_id')&&session('ad_id')==$id) {
                  $arr = array('flag'=>0,'message'=>'请勿重复点赞!');
                   echo json_encode($arr,JSON_UNESCAPED_UNICODE);
            } else {
                  $flag = $love->add_love($id);
                  if($flag) {
                        session('love_id',session('user_id'));
                        session('ad_id',$id);
                        $arr = array('flag'=>0,'message'=>'已点赞');
                        echo json_encode($arr,JSON_UNESCAPED_UNICODE);
                  }
            }
      }

      public function collect_do () { //用户收藏处理
            $id = session('user_id');
            $list = $this->collect_list_do($id);
            $user = D('User');
            $flag = $user->update_love_list($id,$list);
            if ($flag) {
                  $result = array('message'=>"收藏成功");
                  echo json_encode($result,JSON_UNESCAPED_UNICODE);
            } else {
                $result = array('message'=>"收藏失败");
                echo json_encode($result,JSON_UNESCAPED_UNICODE);
            }
      }

      private function get_ad_byname () { //根据姓名获取广告
            $ad = D('Ad');
            $name = I('post.na_ad_name');
            if ($name==null){
                  trigger_error(showMessage('查询信息不能为空'),E_USER_ERROR);
            }
            $data = $ad->get_ad_by_name($name);
            return $data;
      }

      private function collect_list_do ($id1) {//处理用户收藏列表
            $user = D('User');
            $id = $_POST['id'];
            $data = $user->get_love($id1);
            $list = $data['na_user_lovelist'];
            if ($list==null) {
                  $list = $id;
            } else{
                  $list.=",{$id}";
            }
            return $list;
      }

      private function get_comment ($id) { //根据id获取指定广告的评论信息
            $comment = D('Comment');
            $data = $comment->get_comment($id);
            return $data;
      }

    private function get_ad_byid ($id) { //根据ID获取广告信息
          $ad = D('Ad');
          $ad->add_count($id);
          $data = $ad->get_ad_byid($id);
          return $data;
    }

    private function go_url ($type){ //根据广告类型判断跳转页面
          $this->assign('most',$this->get_most_ad($type));
          if ($type=='视频') {
                $this->display(ads);
          } elseif ($type=='图文') {
                $this->display(p_info);
          }
    }

    private function get_most_ad ($type) { //获取推荐列表广告
          $ad = D('Ad');
          $data = $ad->get_most_ad(4,$type);
          return $data;
    }

    private function get_user_state () { //查询用户状态
          //session('user_id',5);
          $user = D('User');
          $state = $user->get_user_state();
          return $state;
    }

    public function download() {
        $this->download_handle();
    }

    public function _empty ($id){
          if (!$id) {
                showMessage('无效访问！',__ROOT__.'/Index/index');
          }
    }

    private function download_handle () {//下载视频处理
        $id = I('get.id');
        $ad = D('Ad');
        $info = $ad->get_ad_byId($id);
        $path = $info['na_ad_videopath'];
        $file_name = time().".mp4";
        Http::download($path,$file_name);
    }

}