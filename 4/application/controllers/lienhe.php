<?php
class lienhe extends My_Controller
{
	function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('contact_model');
    }
	
	 /*
     * Kiểm tra email đã tồn tại chưa
     */
    function check_email()
    {
        $email = $this->input->post('email');
        $where = array('email' => $email);
        //kiêm tra xem email đã tồn tại chưa
        if($this->contact_model->check_exists($where))
        {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        }
        return true;
    }
    
	
	function index()
	{
		//neu dang dang nhap thi chuyen ve trang thong tin thanh vien
        if($this->session->userdata('user_id_login'))
        {
            redirect(site_url('lienhe'));
        }
       
		
		
 

        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email|callback_check_email');
           
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
            $this->form_validation->set_rules('content', 'Nội dung', 'required');
  
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                
                $data = array(
                    'name'     => $this->input->post('name'),
                    'email'    => $this->input->post('email'),
                    'phone'    => $this->input->post('phone'),
                    'content'  => $this->input->post('content'),
                   
                    'created'  => now(),
                );
                if($this->contact_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Đăng ký thành viên thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(site_url());
            }
        }
		
		$this->data['temp'] = 'site/lienhe/index';
		$this->load->view('site/layout', $this->data);
	}
	
	
}