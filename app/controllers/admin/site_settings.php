<?php
class Site_settings extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('myclass');
	}

	public function index()
	{
		$data['title'] = '站点设置';
		//基本设置
		if($_POST && $_GET['a']=='basic'){
			$str = array(
				array('value'=>$this->input->post('site_name'),'id'=>1),
				array('value'=>$this->input->post('welcome_tip'),'id'=>2),
				array('value'=>$this->input->post('short_intro'),'id'=>3),
				array('value'=>$this->input->post('show_captcha'),'id'=>4),
				array('value'=>$this->input->post('site_run'),'id'=>5),
				array('value'=>$this->input->post('site_stats'),'id'=>6),
				array('value'=>$this->input->post('site_keywords'),'id'=>7),
				array('value'=>$this->input->post('site_description'),'id'=>8),
				array('value'=>$this->input->post('money_title'),'id'=>9),
				array('value'=>$this->input->post('per_page_num'),'id'=>10),
				array('value'=>$this->input->post('is_rewrite'),'id'=>11),
				array('value'=>$this->input->post('show_editor'),'id'=>12),
				array('value'=>$this->input->post('comment_order'),'id'=>13),
			);
			$this->db->update_batch('settings', $str, 'id');
			//更新config文件
			$config['site_name']=$this->input->post('site_name');
			if($this->input->post('is_rewrite')=='on'){
				$config['index_page']='';
			} else {
				$config['index_page']='index.php';
			}
			$config['show_captcha']=($this->input->post('show_captcha')=='on')?$config['show_captcha']='on':$config['show_captcha']='off';
			$config['show_editor']=($this->input->post('show_editor')=='on')?$config['show_editor']='on':$config['show_editor']='off';
			$config['comment_order']=($this->input->post('comment_order')=='asc')?$config['comment_order']='asc':$config['comment_order']='desc';
			$config['basic_folder']=$this->config->item('basic_folder');
			$config['version']=($this->config->item('version'))?$this->config->item('version'):'V1.0.7';
			$this->config->set_item('myconfig', $config);
			$this->config->save('myconfig',$config);
			$this->myclass->notice('alert("网站设置更新成功");window.location.href="'.site_url('admin/site_settings').'";');
	
		}
		//openid设定
		if($_POST && $_GET['a']=='openid'){
			$qq_callback = 'oauth/qqcallback';
			$this->config->update('openid','qq_appid', $this->input->post('qq_appid'));
			$this->config->update('openid','qq_appkey', $this->input->post('qq_appkey'));
			$this->config->update('openid','qq_callback', $qq_callback);
			$this->myclass->notice('alert("openid更新成功");window.location.href="'.site_url('admin/site_settings').'";');
		}

		//mailset设定
		if($_POST && $_GET['a']=='mailset'){
			$this->config->update('mailset','protocol', $this->input->post('protocol'));
			$this->config->update('mailset','smtp_host', $this->input->post('smtp_host'));
			$this->config->update('mailset','smtp_port', $this->input->post('smtp_port'));
			$this->config->update('mailset','smtp_user', $this->input->post('smtp_user'));
			$this->config->update('mailset','smtp_pass', $this->input->post('smtp_pass'));
			
			$this->myclass->notice('alert("邮件配置更新成功");window.location.href="'.site_url('admin/site_settings').'";');
		}

		//routes
		$data['routes']=array_keys($this->router->routes);
		if($_POST && $_GET['a']=='routes'){

			$routes ="<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n\n";
			$routes .="\$route['default_controller'] = 'home';\n";
			$routes .="\$route['404_override'] = '';\n";
			$routes .="\$route['admin']='/admin';\n";
			$routes .="\$route['add.html']='forum/add';\n";
			$routes .="\$route['qq_login'] = 'oauth/qqlogin';\n";
			$routes .="\$route['qq_callback'] = 'oauth/qqcallback';\n";
			$routes .="\$route['".$this->input->post('flist_url')."'] = 'forum/flist/$1';\n";
			$routes .="\$route['".$this->input->post('view_url')."'] = 'forum/view/$1';\n";
			
			if(write_file(APPPATH.'config/routes.php', $routes)){
				$this->myclass->notice('alert("自定义url更新成功");window.location.href="'.site_url('admin/site_settings').'";');
			}
		}
		
		$data['item'] = $this->db->get_where('settings',array('type'=>0))->result_array();

		$this->load->view('site_settings', $data);

	}

	
}