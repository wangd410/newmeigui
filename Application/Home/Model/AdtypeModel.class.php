<?php
namespace Home\Model;

use Think\Model;

class AdtypeModel extends Model
{
      public  function get_adType () {
            $adType = M('Adtype');
            $data = $adType->select();
            return $data;
      }
}