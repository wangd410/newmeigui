<?php
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model {
	public function checkInfo ($data) //判断登陆信息
	{
		if(empty($data['loginname'])||empty($data['password'])) {
			$flag = -1; //用户名或密码为空
		} else {
			$user = M('Admin');
			$info = $user->where(array('na_admin_loginName'=>$data['loginname']))->find();
			if($info){
				if($info['na_admin_pwd']==$data['password']){
						if($info['na_admin_state']==1)
						{
							$flag = 1; //信息匹配
						}else 
						{
							$flag = -2;//没有权限
						}
					} else {
						$flag = 0; //密码错误
					}
				}else{
					$flag = 2; //用户名不存在
				}	 
			}
			return $arr = array('flag'=>$flag,'type'=>$info['na_admin_type'],'name'=>$info['na_admin_name'],'id'=>$info['na_admin_id']);
			 
		}	

		public function getAdmin () { //获取除admin管理员以外的所有管理员
			$admin = M('Admin');
			$map['na_admin_name'] = array('NEQ','admin');
			$adminInfo = $admin->order('na_admin_state')->where($map)->select();
			return  $adminInfo;
		}
		
		public function updateState ($status,$id)//修改管理员状态
		{
			$admin = M('Admin');
			$data['na_admin_state'] = $status;
			$flag = $admin->data($data)->where(array('na_admin_id'=>$id))->save();
			return $flag;
		}
		
		public function deleteAdmin ($id)//删除管理员
		{
			$admin = M('Admin');
			$flag = $admin->where(array('na_admin_id'=>$id))->delete();
			return $flag;
		}
		
		public function updatePass ($pwd) //修改管理员密码
		{
			$admin = M('Admin');
			$map['na_admin_pwd'] = $pwd;
			$map['na_admin_id'] = session('id');
			$flag = $admin->data($map)->save();
			return $flag;
		}
			
		public function addAdmin ($data)//增加新的管理员
		{
			$admin = M('Admin');
			$data1 = $data;
			if (!$data1['na_admin_name']||!$data1['na_admin_loginName'])
			{
				$flag = -1;
			}else if($this->getAdminByLogin($data1['na_admin_loginName']))
			{
			 	$flag=0;
			} else 
			{
			$data1['na_admin_time'] = date('Y-m-d H:i:s');
			$data1['na_admin_uname'] = session('login');
			if($flag = $admin->data($data1)->add()) $flag = 1;
			}
			return $flag;
		}
		
		
		private function getAdminByLogin ($loginname) //根据用户名查询管理员信息
		{
			$map['na_admin_loginName'] = $loginname;
			$admin = M('Admin');
			$data = $admin->where($map)->select();
			return $data;
		}
		
		public function checkPwd ($oldPass) //验证原始密码是否正确
		{
			$id = session('id');
			$admin = M('Admin');
			$data = $admin->find($id);
			if($data['na_admin_pwd']==$oldPass)
			{
				$flag = 1;
			} else 
			{
				$flag = 0;
			}
			return $flag;
		}
			
 	}
 	
 		
