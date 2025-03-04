<?php
class login extends MY_Controller
{
	function index ()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post())
		{
			$this->form_validation->set_rules('login','login','callback_check_login');
			if($this->form_validation->run())
			{
				$this->session->set_userdata('login',true);
				redirect(admin_url('home'));
			}
		}
		$this->load->view('admin/login/index');
	}
	
	/*
	*** kiem tra username vs pass word co chinh xac khong
	*/
	
	function check_login()
	{
		$username=$this->input->post('username');
		$password= $this->input->post('password');
		$password=md5($password);
		
		$this->load->model('admin_model');
		$where=array('username'=>$username,'password'=>$password);// kiem tra su ton tai cua du lieu , where: mang du lieu ieu kien
		if($this->admin_model->check_exists($where))
		{
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__,'không đăng nhập thành công');
		return false;
	}
}
