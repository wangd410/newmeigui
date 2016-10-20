<?php
namespace Home\Model;

use Think\Model;
use Org\Util\Page;

class CommentModel extends Model
{
	public function get_comment_id ($id,$cols=10) {//获取指定id的评论信息
	      $comment = M('Comment');
            $map = array('a.na_comment_type'=>'评论','na_comment_adId'=>$id,'_logic'=>'and');
            $count = $comment->table('na_comment a,na_user b')->where('a.na_comment_userId=b.na_user_id')->where($map)->count();
            $page = new Page($count,$cols);
            $show = $page->show();
            $list = $comment->table('na_comment a,na_user b')->where('a.na_comment_userId=b.na_user_id')->where($map)->order('na_comment_time desc')
                  ->limit($page->firstRow.",".$page->listRows)->select();
            $data = array('page'=>$show,'list'=>$list);
            return $data;
      }

      public function add_commnet ($content) {
            $comment = M('Comment');
            $data = new \stdClass();
            $data->na_comment_content = $content['na_comment_content'];
            $data->na_comment_time = date('Y-m-d H:m:s');
            $data->na_comment_adId = $content['id'];
            $data->na_comment_userId = session('user_id');
            $data->na_comment_type = '评论';
            $flag = $comment->data($data)->add();
            return $flag;
      }
}