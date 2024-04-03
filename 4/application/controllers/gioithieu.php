<?php
class gioithieu extends MY_Controller
{
	function index()
	{
		//lay danh sach slide
	    $this->load->model('slide_model');
	    $slide_list = $this->slide_model->get_list();
	    $this->data['slide_list'] = $slide_list;
		
		$this->data['temp'] = 'site/gioithieu/index';
		$this->load->view('site/layout', $this->data);
	}
}