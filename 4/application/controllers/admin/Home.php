<?php
Class Home extends MY_Controller
{
	function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('transaction_model');
    }
	
    function index()
    {
		$total_rows = $this->transaction_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('home/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 5;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        //kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if($id > 0)
        {
            $input['where']['id'] = $id;
        }
        $name = $this->input->get('name');
        if($name)
        {
            $input['like'] = array('name', $name);
        }
        
        
        //lay danh sach san pha
        $list = $this->transaction_model->get_list($input);
        $this->data['list'] = $list;
       
        //lay danh sach danh muc san pham
        $this->load->model('transaction_model');
        $input = array();
        $input['where'] = array('user_id' => 0);
        $tran = $this->transaction_model->get_list($input);
        foreach ($tran as $row)
        {
            $input['where'] = array('user_id' => $row->id);
            $subs = $this->transaction_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['transaction'] = $tran;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
		
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
	
	/*
     * Xóa nhiều sản phẩm
     */
    function delete_all()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
    }
	
	 private function _del($id)
    {
        $tranc = $this->transaction_model->get_info($id);
        if(!$tranc)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
            redirect(admin_url('home'));
        }
        //thuc hien xoa san pham
        $this->transaction_model->delete($id);
	}
}