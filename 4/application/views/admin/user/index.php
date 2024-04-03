
<?php
 $this->load->view('admin/user/head')
 ?>
 
 <div class="line"></div>
 <div class="wrapper">
	<div class="widget">
	<?php $this->load->view('admin/message',$this->data);?><!--hien thi thong bao ban da them thanh cong-->
		<div class="title">
			
			<h6>Danh sách Thành viên</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					
					<td style="width:80px;">Mã số</td>
					<td>HỌ va Tên</td>
				
					<td>Email</td>
                    <td>Phone</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
			<tbody>
				<!-- Filter -->
                <?php foreach ($list as $row):?>
				<tr>
                <!-- khoa chinh-->
						
						<td class="textC"><?php echo $row->id?></td>
						<!-- trong databse phan ten admin la name-->
						
						<td><span title="<?php echo $row->name?>" class="tipS">
						<?php echo $row->name?>					</span></td>
						
						
						<td><span title="<?php echo $row->email?>" class="tipS">
							<?php echo $row->email?>					</span></td>
						
						
						<td><span title="<?php echo $row->phone?>" class="tipS">
							<?php echo $row->phone?>					</span></td>
                            
						<td class="option">
							
							
							<a href="<?php echo admin_url('user/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
							    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<?php endforeach ;?>			
				
			</tbody>
		</table>

		
	</div>
</div>
<div class="clear mt30"></div>