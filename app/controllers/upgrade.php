<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#doc
#	classname:	upgrade
#	scope:		PUBLIC
#	StartBBS起点轻量开源社区系统
#	author :doudou QQ:858292510 startbbs@126.com
#	Copyright (c) 2013 http://www.startbbs.com All rights reserved.
#/doc

class Upgrade extends Other_Controller
{
	function __construct ()
	{
		parent::__construct();
		$this->load->library('myclass');

	}
	public function index ()
	{
		$data['old_version'] = $this->config->item('version');
		$data['new_version'] = 'V1.0.9';
		if($data['new_version']==$data['old_version']){
			$data['msg'] = '您的版本为最新版，无需升级';
		} else{
			$data['msg'] = '开始升级';
		}
		$data['log'] = '';
		$this->load->view('upgrade',$data);
	}

	public function do_upgrade ()
	{
		$sql1="ALTER TABLE  `{$this->db->dbprefix}users` CHANGE  `avatar`  `avatar` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;";
		$sql2="ALTER TABLE  `{$this->db->dbprefix}users` ADD  `lastpost` INT( 10 ) NULL DEFAULT NULL AFTER  `lastlogin`;";
		if($this->db->query($sql1) && $this->db->query($sql2)){
			$data['msg1'] = '数据库升级成功';
		}
		//if(){
		//	$data['msg2'] = '删除多余文件成功';
		//}
		if($this->config->update('myconfig','version','V1.0.9')){
			$data['msg_v'] = '版本号更新成功';
		}
		
		$data['finish'] = '升级完成...';
		$data['error'] = '升级失败';
		exit(json_encode($data));		
	}
}