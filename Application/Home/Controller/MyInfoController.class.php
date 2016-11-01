<?php
 namespace Home\Controller;
 
 use Think\Controller;
 
 class MyInfoController extends Controller
 {
 	public function index ()
      {
            session('user_id',12);
            $collect = $this->get_collect();
            $move = $this->get_move();//获取个人动态信息
            $data = $this->get_info();//个人信息
            $ad_info = $this->get_ad($collect['na_user_lovelist']);//个人收藏列表信息
            $love = $this->get_love();//推荐广告信息
            $this->assign('movepage',$move['page']);
            $this->assign('movelist',$move['list']);
            $this->assign('love',$love);
            $this->assign('page',$ad_info['page']);
            $this->assign('list',$ad_info['list']);
            $this->assign('info',$data);
            $this->display('mi');
 	}

 	public function move_add () {//增加动态
            $comment = D('Comment');
 	      $content = trim($_POST['na_comment_content']);
            $flag = $comment->move_add($content);
            if($flag) {
                  showMessage('发表成功!');
            }
      }

 	private function get_info () {//获取个人信息
 	      $user = D('User');
            $data = $user->get_love();
            return $data;
      }

      private function get_collect () {//获取收藏列表信息
            $user = D('User');
            return $user->get_love();

      }

      private function get_ad ($list) { //获取用户收藏列表广告
            $ad = D('Ad');
            return $ad->get_collect($list);
      }

      private function get_love () {//获取个人中心推荐列表
            $love = D('Adlove');
            return $love->array_ad();
      }

      private function get_move () {//获取个人动态
            $comment = D('Comment');
            return $comment->get_move();
      }
 }