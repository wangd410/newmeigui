<?php
return array(
	//修改模板中文件的后缀
	'TMPL_TEMPLATE_SUFFIX' =>'.fix',
		
	//连接数据库
	//PDO专用定义
	'DB_TYPE'=>'mysql',
	'DB_USER'=>'root',
	'DB_PWD'=>'root',
	'DB_PREFIX'=>'na_',
	'DB_DSN'=>'mysql:host=localhost;dbname=new_ad;charset=UTF8',
		
	//页面调试工具
	'SHOW_PAGE_TRACE'=>false,
		
	//允许模块访问
	'MODULE_ALLOW_LIST' => array('Home','Admin'),
	//设置默认访问的模块
	'DEFAULT_MODULE'=>'Home',
		
	//方法后缀名
	//'ACTION_SUFFIX' => 'Action',
	
	//开启路由
	'URL_ROUTER_ON' => true,		//开启路由
	'URL_MAP_RULES'=> array(
		 'u'=>'Login/checkLogin', 	//检查登陆路由
		 'gg'=>'Login/quit',  		//退出登录路由
		 'us'=>'Admin/updatePass',  //修改密码路由
		 'aa'=>'Admin/adminAdd',	//新增管理员路由
		 'aA'=>'Admin/addA',		//新增管理员处理路由
		 'at'=>'Adtype/typeAdd',	//新增类型路由
		 'ta'=>'Adtype/addType',	//新增信息处理路由
		 'ue'=>'Comment/userEdit',	//用户禁言路由
		 'uv'=>'UploadFiles/video', //添加视频页面路由

            //前台静态路由
             'as'=>'AdSearch/searchAd', //搜索视频路由
             'Aa'=>'AdMetail/add_comment',//发表评论路由
             'As'=>'AdMetail/search_ad', //搜索广告路由
             'mm'=>'MyInfo/move_add', //发表动态路由
             'Mu'=>'MyInfo/update_info', //修改个人信息路由
             'lr'=>'Login/res_user', //注册路由
             'Ad'=>'AdMetail/download',//视频下载路由
             'lc'=>'Login/check_login',//登陆验证路由
	),
	/* 'URL_ROUTE_RULES'=>array(
		 'cd'=>':Commtent/:deleteComment/:id',
	), */
);