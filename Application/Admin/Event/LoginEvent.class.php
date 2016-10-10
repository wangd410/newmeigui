<?php
namespace Admin\Event;

class LoginEvent 
{
	public function quit () //退出登录
	{
		session('login',null);
		session('type',null);
		showMessage('注销成功','login');
	}
	
	public function go ($result) //匹配登陆错误信息
	{
		switch ($result['flag']) {
			case -2:
				showMessage('您的账号已被禁用！请联系管理员');
				braek;
			case -1:
				showMessage('用户名或密码不能为空!');
				braek;
			case  0:
				showMessage('密码错误!');
				braek;
			case  2:
				showMessage('用户名不存在');
			case  1:
				session('login',$result['name']);
				session('type',$result['type']);
				session('id',$result['id']);
				showMessage('登陆成功!',__MODULE__.'/index');
		}
	}
}