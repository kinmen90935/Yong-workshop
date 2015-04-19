<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commonlib {

	public function __construct()
	{
	}

	public function json($data)
	{
		header('Content-type: application/json');
		echo json_encode($data);
	}

    public function cut_content($a,$b){
	    $a = strip_tags($a); //去除HTML標籤
	    $sub_content = mb_substr($a, 0, $b, 'UTF-8'); //擷取子字串
	    return $sub_content . '....';  //顯示處理後的摘要文字
	}
}