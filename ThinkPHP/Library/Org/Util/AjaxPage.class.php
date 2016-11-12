<?php

namespace Org\Util;

class AjaxPage
{
      //分页栏没栏显示的页数
      public $rollPage = 5;
      //页面跳转时带的参数
      public $parameter;
      //记录总条数
      public $totalRows;
      //每页显示的记录数
      public $listRows;
      //起始条数
      public $firstRow;
      //分页总页面数
      protected  $totalPages;
      //当前页数
      protected  $nowPage;
      //分页的栏的总页数
      protected $coolPages;
      //分页显示定制
      protected $config = array('header'=>'条记录','prev'=>'上一页','next'=>'下一页','first'=>'第一页','last'
      =>'最后一页','theme'=>'%totalRow% %header% %nowPage%/%totalPage%页 %upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%'
      );
      //默认分页变量名
      protected $varPage;

      public function __construct ($totalRows,$listRows='',$ajax_func,$parameter='') {
            $this->totalRows = $totalRows;
            $this->ajax_func = $ajax_func;
            $this->parameter = $parameter;
            $this->varPage = C('VAR_PAGE')?C('VAR_PAGE'):'p';
            if (!empty($listRows)) {
                  $this->listRows = intval($listRows);
            }
            $this->totalPages = ceil($this->totalRows/$this->listRows);
            $this->coolPages = ceil($this->totalPages/$this->rollPage);
            $this->nowPage = !empty($_GET[$this->varPage])?intval($_GET[$this->varPage]):1;
            if (!empty($this->totalPages)&&$this->nowPage>$this->totalPages) {
                  $this->nowPage = $this->totalPages;
            }
            $this->firstRow = ($this->nowPage-1)*$this->listRows;
      }

      public function setConfig ($name,$value) {
            if (isset($this->config[$name])) {
                  $this->config[$name] = $value;
            }
      }

      public function show () {
            if($this->totalRows==0) {
                  return "";
            }
            $p = $this->varPage;
            $nowCoolPage = ceil($this->nowPage/$this->rollPage);
            $url = $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?").$this->parameter;
            $parse = parse_url($url);
            if (isset($parse['query'])) {
                  parse_str($parse['query'],$params);
                  unset($params[$p]);
                  $url = $parse['path']."?".http_build_query($params);
            }
            //上下翻页字符串
            $upRow = $this->nowPage-1;
            $downRow = $this->nowPage+1;
            if($upRow>0) {
                  $upPage = "<a id='big' href='javascript:".$this->ajax_func."(".$upRow.")'>".$this->config['prev']."</a>";
            } else {
                  $upPage = "";
            }
            if ($downRow<=$this->totalPages) {
                  $downPage = "<a id='big' href='javascript:".$this->ajax_func."(".$downRow.")'>".$this->config['next']."</a>";
            } else {
                  $downPage = "";
            }
            //<< < > >>
            if ($this->nowPage == 1) {
                  $theFirst = "";
                  $prePage = "";
            } else {
                  $preRow = $this->nowPage-$this->rollPage;
                  if ($preRow>0){
                        $prePage =  "<a id='big' href='javascript:".$this->ajax_func."(".$preRow.")'>上".$this->rollPage."页</a>";
                        $theFirst = "<a id='big' href='javascript:".$this->ajax_func."(1)'>".$this->config['first']."</a>";
                  }
            }
            if ($nowCoolPage == $this->coolPages) {
                  $nextPage = "";
                  $theEnd = "";
            } else {
                  $nextRow = $this->nowPage+$this->rollPage;
//                  if ($nextRow>$this->totalPages) {}
                  $theEndRow = $this->totalPages;
                  $nextPage = "<a id='big' href='javascript:".$this->ajax_func."(".$nextRow.")'>下".$this->rollPage."页</a>";
                  $theEnd = "<a id='big' href='javascript:".$this->ajax_func."(".$theEndRow.")'>".$this->config['last']."</a>";
            }

            //1 2 3 4 5
            $linkPage = "";
            for ($i=1;$i<=$this->rollPage;$i++) {
                  $page = ($nowCoolPage-1)*$this->rollPage+$i;
                  if ($page!=$this->nowPage) {
                        if ($page<=$this->totalPages) {
                              $linkPage .= "&nbsp;<a id='big' href='javascript:".$this->ajax_func."(".$page.")'>".$page."</a>";
                        } else {
                              break;
                        }
                  } else {
                        if ($this->totalPages != 1) {
                              $linkPage .= "&nbsp;<span class='current'>".$page."</span>";
                        }
                  }
            }
            $pageStr = str_replace(
                  array('%header%','%nowPage%','%totalRow%','%totalPage%','%upPage%','%downPage%','%first%','%prePage%','%linkPage%','%nextPage%','%end%'),
                  array($this->config['header'],$this->nowPage,$this->totalRows,$this->totalPages,$upPage,$downPage,$theFirst,$prePage,$linkPage,$nextPage,$theEnd),$this->config['theme']);
            return $pageStr;
      }
}