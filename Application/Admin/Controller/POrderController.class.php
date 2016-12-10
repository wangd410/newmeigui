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
        $pic = $this->get_picture('广告');
        $this->assign('pic',$pic);
        $this->display('ao');
    }

    public function comment_o () {//广告评论页面
        $pic = $this->get_picture('评论');
        $this->assign('pic',$pic);
        $this->display('co');
    }

    /*
     * 更新录播图片操作
     * @param mixed 获取前台表单传入的相关值
     * @return mixed
     * */
    public function update_picture() {
        $picture = I('post.');
        $flag = $picture->update_picture();//更新操作
        if ($flag) {
            showMessage('修改成功');
        } else {
            showMessage('修改失败');
        }
    }

    /*
     * 上传图片管理
     * @return void
     * */
    public function upload_pic() {
        $this->pic_up('picture');
    }


    /*
     * 上传轮播图片
     * @param String $path 文件上传路径
     * @return json
     * */
    private function pic_up($path) {
        $upload = new Upload();//实例化上传类
        $upload->maxSize = 3145728;//设置附件上传大小
        $upload->exts = array('jpg','gif','png','jpeg','bmp');//设置附件上传类型
        $upload->rootPath = './Public/';//设置附件上传根目录
        $upload->savePath = '/'.$path.'/';//设置附件上传目录
        $info = $upload->uploadOne($_FILES["pic"]);
        if ($info)
        {
            $result = array('path'=>'Public'.$info['savepath'].$info['savename'],'message'=>'上传成功！');
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }
        else
        {
            $result = array('path'=>'','message'=>$upload->getError());
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }
    }

    /*
     * 获取轮播图片信息
     * @param String $type 图片类型（广告或评论）
     * @return mixed
     * */
    private function get_picture ($type) {//获取轮播图片信息
        $pic = D('Picture');
        return $pic->get_picture($type);
    }
}