<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;

class AdtypeController extends Controller
{	
	public function __construct () {
		parent::__construct();
		if (!session('?login')&&!session('?type')) {
			showMessage('请登录~',__MODULE__.'/login/index');
		}
	}
	
    public function index()
    {
       $type = D('Adtype');
       $data = $type->getType(9);
       $this->assign('name',session('login'));
       $this->assign('page',$data['page']);
       $this->assign('list',$data['list']);
       $this->display(typeList);
    }
    
    public function typeAdd ()//显示typeAdd模板
    {
    	$this->display("typeAdd");
    }


    public function et() {
        $id = $_GET['id'];
        $type_info = $this->get_type_info($id);
        $this->assign('type_info',$type_info);
        $this->display('et');
    }

    /*
     * 根据id获取详情
     * @param int $id
     * @return mixed
     * */
    private function  get_type_info($id) {
        $type = D('Adtype');
        return $type->get_info_by_id($id);
    }

    /*
     * 上传图片操作
     * */
     public function type_pic_up() {
         $this->pic_up('typePic');
     }

     /*
      * 更新拍拍操作
      * @param mixed 前台修改的表单信息
      * @return void
      * */
     public function update_info(){
         $info = I('post.');
         $type = D('Adtype');
         $flag = $type->update_info($info);
         if($flag){
             showMessage('修改成功',__MODULE__."/Adtype");
        } else {
            showMessage('修改失败');
         }
     }

         /*
     * 新增品牌
     * @param mixed $type_info 品牌相关信息
     * @return void
     * */
    public function addType ()
    {
    	$type = I('post.');
    	if ($type==null){
    		showMessage("请输入信息");
    	}
    	$adtype = D('Adtype');
    	if($adtype->typeAdd($type))
    	{
    		showMessage('添加成功','adtype');
    	} else 
    	{
    		showMessage('添加失败');
    	}
    }

    /*
     * 品牌删除
     * @param int $id 根据id值唯一删除
     * @return void
     * */
    public function typeDelete() //类型删除
    {
    	$id = I('get.id');
    	if(D('Adtype')->typeDelete($id))
    	{
    		showMessage('删除成功');
    	} else 
    	{
    		showMessage('删除失败');
    	}	
    }

    /*
     * 上传图片操作
     * @param null
     * @return json 返回报告信息
     * */
    public function up_pic() {
        $this->pic_up('type_icon');
    }

    /*
     * 上传品牌图片
     * @param String $path 文件上传路径
     * @return json
     * */
    private function pic_up($path) {
        $upload = new Upload();//实例化上传类
        $upload->maxSize = 3145728;//设置附件上传大小
        $upload->exts = array('jpg','gif','png','jpeg','bmp');//设置附件上传类型
        $upload->rootPath = './Public/';//设置附件上传根目录
        $upload->savePath = '/admin/uploads/'.$path.'/';//设置附件上传目录
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
}