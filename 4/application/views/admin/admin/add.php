<!-- head -->
<?php $this->load->view('admin/admin/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
      <div class="widget">
           <div class="title">
			<h6> Thêm mới quản trị viên</h6>
		</div>
		
		 
      <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
          <fieldset>
                <div class="formRow">
                	<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo set_value('name')?>" name="name"></span>
                        <!--value: khi nhap chua du 8 ki tu tren name thi no ko xoa di ma cho chung ta nhap tiep-->
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Username:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo set_value('username')?>" id="param_username" name="username"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('username')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Password:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="password" _autocheck="true" id="param_password" name="password"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('password')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Nhập lại mật khẩu:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="password" _autocheck="true" id="param_re_password" name="re_password"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('re_password')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                <div class="formSubmit">
	           			<input type="submit" class="redB" value="Thêm mới">
	           	</div>
          </fieldset>
      </form>
      
      </div>
</div>