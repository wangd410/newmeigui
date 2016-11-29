<?php
namespace  Admin\Controller;
use Think\Controller;
use Think\Upload;

class UploadFilesController extends Controller 
{
	public function __construct ()
      {
		parent::__construct();
		if (!session('?login')&&!session('?type')) {
			showMessage('请登录~',__MODULE__.'/login/index');
		}
	}
	
	public function index ()//添加图文页面
	{
		$adtype = D('Adtype');
		$type = $adtype->getAdtype();
		$this->assign('type',$type);
		$this->display(ptUpload);
	}
	
	public function video () //添加视频页面
	{
            $adtype = D('Adtype');
		$type = $adtype->getAdtype();
		$this->assign('type',$type);
		$this->display(videoUpload);
	}
	
	public function addPt () //添加图文广告
	{
		$data = $_POST;
		isEmpty($data); 
		$ad = D('Ad');
		if ($_FILES['pic']['name']!=null)
		{
			$path = $this->picDo('textPic');
			$data = array_merge($data,array('na_ad_showPath'=>$path));
		}else 
		{
			showMessage('未选择上传文件！');
		}
		$flag = $ad->addAd($data);
		if ($flag)
		{
			showmessage ('广告添加成功',__MODULE__.'/list/index');
		}else
		{
			showmessage ('广告添加失败');
		}
	}
	
	
	public function videoAd () //添加视频广告
	{
		$ad = D('Ad');
		$data = I('post.');
        if($data==null){
            showMessage('未知错误发生！');
            exit();
        }
		$data1 = array_merge($data,array('na_ad_showPath'=>session('videoPic'),'na_ad_videoPath'=>session('video'),'na_ad_time'=>date('Y-m-d H:i:s')));
		$flag = $ad->videoAd($data1);
		if ($flag)
		{
			session('video','');
			session('videoPic','');
			showMessage('添加成功',__MODULE__.'/list/video');
		}else
		{
			showMessage('添加失败');
		}
	}
	
	public function videoAdd() //视频上传
	{
		if($_FILES['video']['error']==0) 
		{
			$this->videoDo();
		} 	
	} 
	
	public function videoPicAdd () //封面图片上传
	{
		if($_FILES['pic']['error']==0) 
		{
			$path = $this->picDo('videoPic');
			session('videoPic',$path);
		}
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
	
	private function videoDo () //视频上传处理
	{
		$upload = new Upload();//实例化上传类
		$upload->maxSize = 222222222222;//设置附件上传大小
		$upload->exts = array('mp4','rmvb','wmv','avi');//设置附件上传类型
		$upload->rootPath = './Public/';//设置附件上传根目录
		$upload->savePath = '/admin/uploads/video/';//设置附件上传目录
		$info = $upload->uploadOne($_FILES['video']);
		if ($info)
		{
			session('video','Public'.$info['savepath'].$info['savename']);
		} else
		{
			$error = array('error'=>$upload->getError());
			echo json_encode($error,JSON_UNESCAPED_UNICODE);
		}
		
	}
	
}