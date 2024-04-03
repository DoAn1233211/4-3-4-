<?php
Class All_product extends MY_Controller
{
	function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
    }
	
	
	function index()
	{
		//lay danh sach san pham moi
	    $this->load->model('product_model');
	    $input = array();
	    
	    $product_newest = $this->product_model->get_list($input);
	    $this->data['product_newest'] = $product_newest;
		
		
		//lay noi dung cua bien message
	   $message=$this->session->flashdata('message');
	   $this->data['message']=$message; 
		
		//lay danh sach slide
	    $this->load->model('slide_model');
	    $slide_list = $this->slide_model->get_list();
	    $this->data['slide_list'] = $slide_list;
		
       

 
        //lấy ra danh sách sản phẩm thuộc danh mục đó
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = base_url('all_product/index/'); //link hien thi ra danh sach san pham
        $config['per_page']   = 6;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 7;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);
        
        
        
        //lay danh sach san pham
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
		
		
        
		
		$this->data['temp'] = 'site/all_product/index';
		$this->load->view('site/layout', $this->data);
	}
	
	/*
     * Hiển thị danh sách sản phẩm theo danh mục
     */
    function catalog()
    {
        //lấy ID của thể loại
        $id = intval($this->uri->rsegment(3));
        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        
        $this->data['catalog'] = $catalog;
        $input = array();
        
        //kiêm tra xem đây là danh con hay danh mục cha
        if($catalog->parent_id == 0)
        {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if(!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
            {
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub)
                {
                    $catalog_subs_id[] = $sub->id;
                }
                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            }else{
                $input['where'] = array('catalog_id' => $id);
            }
        }else{
            $input['where'] = array('catalog_id' => $id);
        }
 
        //lấy ra danh sách sản phẩm thuộc danh mục đó
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = base_url('all_product/catalog/'.$id); //link hien thi ra danh sach san pham
        $config['per_page']   = 3;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);
        
        
        //lay danh sach san pham
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        
        //hiển thị ra view
        $this->data['temp'] = 'site/all_product/catalog';
        $this->load->view('site/layout', $this->data);
    }
    
    /*
     * Xem chi tiết sản phẩm
     */
    function view()
    {
        //lay id san pham muon xem
        $id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if(!$product) redirect();
        $this->data['product'] = $product;
        
        //lấy danh sách ảnh sản phẩm kèm theo
        $image_list = @json_decode($product->image_list);
        $this->data['image_list'] = $image_list;
		
		//cap nhat luot xem 
		$data=array();
		$data['view']=$product->view +1;
		$this->product_model->update($product->id,$data);
        
        //lay thong tin cua danh mục san pham
        $catalog = $this->catalog_model->get_info($product->catalog_id);
        $this->data['catalog'] = $catalog;

        //hiển thị ra view
        $this->data['temp'] = 'site/all_product/view';
        $this->load->view('site/layout', $this->data);
    }
}