<?php
Class Admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
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
        $list = $this->admin_model->get_list($input);
        $this->data['list'] = $list;
        
        $total = $this->admin_model->get_total();
        $this->data['total'] = $total;
		
       //lay noi dung cua bien message
	   $message=$this->session->flashdata('message');
	   $this->data['message']=$message; 
	   
        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Kiểm tra username đã tồn tại chưa
     */
    function check_username()
    {
        $username = $this->input->post('username');
        $where = array('username' => $username);
        //kiêm tra xem username đã tồn tại chưa
        if($this->admin_model->check_exists($where))
        {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
            return false;
        }
        return true;
    }
    
    /*
     * Thêm mới quản trị viên
     */
    function add()
    {
		// kiem tra du lieu nhao vao tu form nen su dung thu vien validation
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');//ko dc bo trong phai nhap it nhat 8 ki tu
			//1. ten the trong form muon kt
			//2.ten xuat ra khi thong bao loi 3. cac tap luan muo su dung tren web hocphp.info
            $this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|callback_check_username');//ko dc bo trong goi lai ham xu ky
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');// 2 o nhap giong nhau
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $name     = $this->input->post('name');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                
                $data = array(
                    'name'     => $name,
                    'username' => $username,
                    'password' => md5($password) // ma hoa password = md5
                );
				//them du lieu vao admin
                if($this->admin_model->create($data))
                {
                   $this->session->set_flashdata('message','them moi du lieu thanh cong');
                }else{
                   $this->session->set_flashdata('khong them duoc');
                }
				redirect(admin_url('admin'));
            }
        }
        
        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->data);
    }
	/*
	* ham chinh sua thong tin quan tri vien
	*/
	function edit()
	{
		// lay id quan tri vien can chinh sua
		$id= $this ->uri->rsegment('3');
		
		 $this->load->library('form_validation');
        $this->load->helper('form');
        
		// lay thong tin cua quan tri vien
		$info=$this->admin_model->get_info($id);
		if(!$info)// kiem tra quan tri vien co ton tai kox	
		{
			$this->session->set_flashdata('message','khong ton tai quan tri vien');
			redirect(admin_url('admin'));
		}
		
		$this->data['info']=$info;
		
		if($this->input->post())
		{
			
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');//ko dc bo trong phai nhap it nhat 8 ki tu
			//1. ten the trong form muon kt
			//2.ten xuat ra khi thong bao loi 3. cac tap luan muo su dung tren web hocphp.info
            $this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|callback_check_username');
			
			$password=$this->input->post('password');
			if($password)
			{
				
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
			}
			
			
			 if($this->form_validation->run())
            {
                //them vao csdl
                $name     = $this->input->post('name');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                
                $data = array(
                    'name'     => $name,
                    'username' => $username,
                    // ma hoa password = md5
                );
				if($password)
				{
					$data['password']=md5($password);
				}
				//them du lieu vao admin
                if($this->admin_model->update($id,$data))
                {
                   $this->session->set_flashdata('message','câp nhật du lieu thanh cong');
                }else{
                   $this->session->set_flashdata('khong cập nhật duoc');
                }
				redirect(admin_url('admin'));
            }
		}
		 $this->data['temp'] = 'admin/admin/edit';
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
		$info=$this->admin_model->get_info($id);
		if(!$info)// kiem tra quan tri vien co ton tai kox	
		{
			$this->session->set_flashdata('message','khong ton tai quan tri vien');
			redirect(admin_url('admin'));
		}
		// thuc hien xoa
		$this->admin_model->delete($id);
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



