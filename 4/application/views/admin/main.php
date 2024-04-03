<html>
	<head>
    <?php $this->load->view('admin/head');?>
    </head>
    
    <body>
    	<div id="left_content">
        <?php $this->load->view('admin/left');?>
        </div>
        
        <div id="rightSlide">
         <?php $this->load->view('admin/header');?>
         
         <!--content-->
         <?php $this->load->view($temp,$this->data);?>
         
         <!--end content-->
         <?php $this->load->view('admin/footer')?>
        </div>
        
        <div id="clear">
        </div>
    </body>
</html>