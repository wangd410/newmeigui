<?php
namespace Admin\Controller;
use Think\Controller;

class EmptyController extends Controller
{
	function index () {
		showMessage('非法访问','index/error');
	}
}