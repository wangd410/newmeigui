<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;

class ListController extends Controller
{	
	public function __construct () {
		parent::__construct();
		if (!session('?login')&&!session('?type')) {
			showMessage('请登录~',__MODULE__.'/login/index');
		}
	}
	
    public function index ()
    {
       $data = $this->getPt();  
       $this->assign('empty',"<p style='color:red;font-size: strong 20 px; '>暂时没有图文广告信息</p>");
       $this->assign('page',$data['page']);
       $this->assign('list',$data['list']);
       $this->display(ptManage);
    }
    
    public function video () 
    {
    	$data = $this->getVideo();   	
    	$this->assign('empty',"<p style='color:red;font-size:strong 10 px;'>暂时没有视频广告信息</p>");
    	$this->assign('page',$data['page']);
    	$this->assign('list',$data['list']);
    	$this->display(videoManage);	
    }
    
    public function deleteAd ()// 删除图文广告
    {
    	$ad = D('Ad');
    	$id = I('get.id');
    	$flag = $ad->deleteAd($id);
    	if ($flag)
    	{
    		showMessage('删除成功');
    	} else 
    	{
    		showMessage($flag);
    	}
    }
    
    public function deleteV () //删除指定广告信息
    {
    	$ad = D('Ad');
    	$id = I('get.id');
    	if ($flag = $ad->deleteV($id))
    	{
    		showMessage('删除成功');
    	}    	
    }
    
    public function editPt () //编辑图文消息
    {
    	$type = $this->getType();
    	$data = $this->getPtById();
    	$this->assign('type',$type);
    	$this->assign('data',$data);
    	$this->display(editPt);
    }
    
    public function editDo() //修改图文消息
    {
    	$data = I('post.');
    	if ($_FILES['pic']['name']!=null)
    	{
    		$path = $this->picDo('textPic');
    		$data = array_merge($data,array('na_ad_showPath'=>$path));	
    	}
    	if ($flag = (D('Ad')->savePt($data)))
    	{
    		showMessage('修改成功',__MODULE__.'/list/index');
    	}
    }
    
    private function getVideo () //获取全部的视频广告信息
    {
    	$video = D('Ad');
    	if (I('post.name'))
    	{
    		$data = $video->getVideo(I('post.name'));
    	}else
    	{
    		$data = $video->getVideo();
    	}
    	return $data;
    }
    
    private function getPt () //获取图文广告信息
    {
    	$ad = D('Ad');
    	if (I('post.name'))
    	{
    		$data = $ad->getPt(I('post.name'));
    	}else
    	{
    		$data = $ad->getPt();
    	}
    	return $data;
    }
    
    private function getPtById () //根据id获取图文消息
    {
    	$pt = D('Ad');
    	$id = I('get.id');
    	$data = $pt->getPtById($id);
    	return $data; 
    }
    
    private function getType () //获取类型
    {
    	$adtype = D('Adtype');
    	$type = $adtype->getAdtype();
    	return $type;
    }
    
    private function picDo ($path) //图片上传处理
    {
    	$upload = new Upload();//实例化上传类
    	$upload->maxSize = 3145728;//设置附件上传大小
    	$upload->exts = array('jpg','gif','png','jpeg','bmp');//设置附件上传类型
    	$upload->rootPath = './Public/';//设置附件上传根目录
    	$upload->savePath = '/admin/uploads/'.$path.'/';//设置附件上传目录
    	$info = $upload->uploadOne($_FILES['pic']);
    	if ($info)
    	{
    		return 'Public'.$info['savepath'].$info['savename'];
    	}
    	else
    	{
    		showmessage($upload->getError());
    	}
    }
}