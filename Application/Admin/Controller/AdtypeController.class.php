<?php
namespace Admin\Controller;

use Think\Controller;

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
    	$this->display(typeAdd);
    }
    
    public function addType ()//新增类型处理
    {
    	$type = I('post.type');//获得type数据
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
}