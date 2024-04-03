
<div id="leftSide" style="padding-top:30px;"> 
  
  <!-- Account panel -->
  
  <div class="sideProfile"> <a href="#" title="" class="profileFace"><img src="<?php echo public_url('admin')?>/images/user.jpg" width="40"></a> <span>Xin chào: <strong>admin!</strong></span> <span>Nguyễn Quôc Huy</span>
    <div class="clear"></div>
  </div>
  <div class="sidebarSep"></div>
  <!-- Left navigation -->
  
  <ul id="menu" class="nav">
    <li class="home"> <a href="<?php echo admin_url()?>" class="active" id="current"> <span>Bảng điều khiển</span> <strong></strong> </a> </li>
  
    <li class="product"> <a href="admin/product.html" class="exp inactive"> <span>Sản phẩm</span> <strong>3</strong> </a>
      <ul style="display: none;" class="sub">
        <li> <a href="<?php echo admin_url('product')?>"> Sản phẩm </a> </li>
        <li> <a href="<?php echo admin_url('catalog')?>"> Danh mục </a> </li>
        
      </ul>
    </li>
    <li class="account"> <a href="admin/account.html" class="exp inactive"> <span>Tài khoản</span> <strong>1</strong> </a>
      <ul style="display: none;" class="sub">
        <li> <a href="<?php echo admin_url('admin')?>"> Ban quản trị </a> </li>
     
      
       
      </ul>
    </li>
    <li class="account"> <a href="admin/account.html" class="exp inactive"> <span>Thành viên</span> <strong>1</strong> </a>
      <ul style="display: none;" class="sub">
        <li> <a href="<?php echo admin_url('user')?>"> Danh sách Thành Viên </a> </li>
     
      
       
      </ul>
    </li>
    <li class="support"> <a href="admin/support.html" class="exp inactive"> <span>Tin Tức</span> <strong>1</strong> </a>
      <ul style="display: none;" class="sub">
         <li> <a href="<?php echo admin_url('news')?>"> Tin tức </a> </li>
      
      </ul>
    </li>
    <li class="content"> <a href="admin/content.html" class="exp inactive"> <span>Nội dung</span> <strong>1</strong> </a>
      <ul style="display: none;" class="sub">
        <li> <a href="<?php echo admin_url('slide')?>"> Slide </a> </li>
      
       
      </ul>
    </li>
  </ul>
</div>
<div class="clear"></div>
