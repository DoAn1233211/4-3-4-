<?php
Class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    /*
	// tao them username
	function create()
	{
		
		$data =array();
		$data['username']='admin1';
		$data['password']='admin1';
		$data['name']='webthoitrang';
		if($this->admin_model->create($data))
		{
			echo 'them thanh cong';
		}
		else
		{
			echo 'ko them thanh cong';
		}
		
	}
	//update
	function update()
	{
		$id='8';//trang admin cua databse
		$data= array();
		$data['username']='admin2';
		$data['password']='admin2';
		$data['name']='webquanao';
		if($this->admin_model->update($id,$data))
		{
			echo 'successfully';
			
		}
		else
		{
			echo 'that bai';
		}
	}
	//delete
	function delete()
	{
		$id='8';
		if($this->admin_model->delete($id))
		{
			echo 'xoa thanh cong';
		}
		else
		{
			echo '  xoa that bai';
		}
		
	}
	//get _info: xuat thong tin admin
	function get_info()
	{
		$id='1';
		$info= $this->admin_model->get_info($id,'username,password');//chi lat thong tin cua username va pass
		echo '<pre>';
		print_r($info);
	}
	// hien ra tat ca cac danh sach
	function get_list()
	{
		$input=array();
		//$input['where']=array('id'=>1);//lay id o vi ti 1
		//$input['order']=array('id','asc');//sap xep theo ten(username) hoac id
		//$input['limit']=array(1,0);//lay 1 du lieu o vi tri dau tien
		$input['like']=array('name','mod');//lay name cua t mod
		$list=$this->admin_model->get_list($input);
		echo '<pre>';
		print_r($list);
	}*/

    /*
     * Lay danh sach admin
     */
    function index()
    {
        $input = array();
        $list = $this->user_model->get_list($input);
        $this->data['list'] = $list;
        
        $total = $this->user_model->get_total();
        $this->data['total'] = $total;
		
       //lay noi dung cua bien message
	   $message=$this->session->flashdata('message');
	   $this->data['message']=$message; 
	   
        $this->data['temp'] = 'admin/user/index';
        $this->load->view('admin/main', $this->data);
    }
    
   
	/*
	**** ham xoa du lieu
	*/
	function delete()
	{
		// lay id quan tri vien can chinh sua
		$id= $this ->uri->rsegment('3');
		
		 $this->load->library('form_validation');
        $this->load->helper('form');
        
		// lay thong tin cua quan tri vien
		$info=$this->user_model->get_info($id);
		if(!$info)// kiem tra quan tri vien co ton tai kox	
		{
			$this->session->set_flashdata('message','khong ton tai quan tri vien');
			redirect(admin_url('admin'));
		}
		// thuc hien xoa
		$this->user_model->delete($id);
		$this->session->set_flashdata('message','xóa dữ liệu thành công');
			redirect(admin_url('admin'));
	}
	/*
	***** đang xuất
	*/
	function logout()
	{
		if($this->session->userdata('login'))
		{
			$this->session->unset_userdata('login');
		}
		redirect(admin_url('login'));
	}
}



