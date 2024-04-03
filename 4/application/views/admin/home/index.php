<div class="titleArea">
  <div class="wrapper">
    <div class="pageTitle">
      <h5>Doanh thu</h5>
     
      </div>
 <!--   <div class="horControlB menu_action">
      <ul>
        <li><a href="admin/product/add.html"> <img src="<?php echo public_url('admin')?>/images/icons/control/16/add.png"> <span>Thêm mới</span> </a></li>
        <li> <a href="admin/product/?feature=1.html"> <img src="<?php echo public_url('admin')?>/images/icons/control/16/feature.png"> <span>Tiêu biểu</span> </a> </li>
        <li><a href="admin/product.html"> <img src="<?php echo public_url('admin')?>/images/icons/control/16/list.png"> <span>Danh sách</span> </a></li>
      </ul>
    </div>-->
    <div class="clear"></div>
  </div>
</div>
<div class="line"></div>
<div class="wrapper">
  <div class="widgets"> 
    <!-- Stats --> 
    
    <!-- Amount -->
    <div class="oneTwo">
      <div class="widget">
        <div class="title"> <img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/money.png">
          <h6>Doanh số</h6>
        </div>
        <table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
          <tbody>
            <tr>
              <td class="fontB blue f13">Tổng doanh số</td>
              <td style="width:120px;" class="textR webStatsLink red">44,000,000 đ</td>
            </tr>
            <tr>
              <td class="fontB blue f13">Doanh số hôm nay</td>
              <td style="width:120px;" class="textR webStatsLink red">0 đ</td>
            </tr>
            <tr>
              <td class="fontB blue f13">Doanh số theo tháng</td>
              <td style="width:120px;" class="textR webStatsLink red"> 0 đ </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <!-- User -->
    <div class="oneTwo">
      <div class="widget">
        <div class="title"> <img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/users.png">
          <h6>Thống kê dữ liệu</h6>
        </div>
        <table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
          <tbody>
            
            <tr>
              <td><div class="left">Tổng số sản phẩm</div>
                <div class="right f11"><a href="<?php echo admin_url('product')?>">Chi tiết</a></div></td>
              <td class="textC webStatsLink"> 57 </td>
            </tr>
           
            <tr>
              <td><div class="left">Tổng số thành viên</div>
                <div class="right f11"><a href="<?php echo admin_url('admin')?>">Chi tiết</a></div></td>
              <td class="textC webStatsLink"> 2 </td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
    <div class="clear"></div>
    
    <!-- Giao dich thanh cong gan day nhat -->
    
    <div class="widget">
      <div class="title"> <span class="titleIcon">
        <div class="checker" id="uniform-titleCheck"><span>
          <input type="checkbox" name="titleCheck" id="titleCheck" style="opacity: 0;">
          </span></div>
        </span>
        <h6>Danh sách Giao dịch</h6>
         <div class="num f12">Số lượng: <b><?php echo $total_rows?></b></div>
      </div>
      <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
        <thead>
          <tr>
            <td style="width:10px;"><img src="<?php echo public_url('admin')?>/images/icons/tableArrows.png"></td>
            <td style="width:60px;">Mã số</td>
            <td style="width:75px;">Thành viên</td>
            <td style="width:90px;">Số tiền</td>
            <td>Hình thức</td>
            <td style="width:100px;">Giao dịch</td>
            <td style="width:75px;">Ngày tạo</td>
            <td style="width:55px;">Hành động</td>
          </tr>
        </thead>
        <tfoot class="auto_check_pages">
          <tr>
            <td colspan="8"><div class="list_action itemActions"> <a url="<?php echo admin_url('home/delete_all')?>" class="button blueB" id="submit" href="#submit">
             <span style="color:white;">Xóa hết</span> </a> </div>
             <div class="pagination">
					          <?php echo $this->pagination->create_links()?>
		 </div>
             
             </td>
             
             
          </tr>
          
        </tfoot>
        <tbody class="list_item">
         	<?php foreach ($list as $row):?>
          <tr>
            <td><div class="row_<?php echo $row->id?>" id="uniform-undefined"><span>
                <input type="checkbox" value="<?php echo $row->id?>" name="id[]" style="opacity: 0;">
                </span></div></td>
            <td class="textC"><?php echo $row->id?></td>
            <td> <?php echo $row->user_name?> </td>
            <td class="textR red"><?php echo $row->amount?></td>
            <td> <?php echo $row->payment?> </td>
            <td class="status textC"><span class="pending"> Chờ xử lý </span></td>
            <td class="textC"><?php echo get_date($row->created)?></td>
            <td class="textC">
              <a class="tipS verify_action" href="<?php echo admin_url('home/del/'.$row->id)?>" original-title="Xóa"> <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png"> </a></td>
          </tr>
         <?php endforeach;?>
          
        </tbody>
        
      </table>
    </div>
  </div>
</div>
<div class="clear mt30"></div>
