<!DOCTYPE html>
<html lang="en">

				 <!-- Main COntents-->

			<?php
				echo form_open_multipart('admin/add_profile');
			?>
				<div class="cat">
					<div class="col-xs-10 content">

				<h3>Add an admin</h3>
			  <div class="row">
			  <div class="col-sm-9">
			  <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Name:</h4>
				</div>
				<div class="col-sm-8 form-group">
				  <input class="form-control" id="name" name="user_name" placeholder="Name" type="text" required>
				</div>
			  </div> 
			  <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Email:</h4>
				</div>
				<div class="col-sm-8 form-group">
				<div class="alert-danger ">
				<?php
				 echo form_error('user_email'); 
				?>
				</div>
				  <input class="form-control" id="name" name="user_email" placeholder="Email" type="text" required>
				</div>
			  </div> 
			  <input name="user_type" placeholder="user_type" type="hidden" value ="user">
			  <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Password:</h4>
				</div>
				<div class="col-sm-8 form-group">
				<div class="alert-danger ">
				<?php
				 echo form_error('user_password'); 
				?>
				</div>
				  <input class="form-control" id="password" name="user_password" placeholder="Password" type="password" required>
				</div>
			  </div> 
			  <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Re-enter Password:</h4>
				</div>
				<div class="col-sm-8 form-group">
				<div class="alert-danger ">
				<?php
				 echo form_error('user_passconf'); 
				?>
				</div>
				  <input class="form-control" id="re-pass" name="user_passconf" placeholder="Password" type="password" required>
				</div>
			  </div> 
				<button class="btn btn-success" type="submit" style="width:30%,float:right;">Submit</button>
			  </div>
			  
			  <!-- Right side photo showing portion -->
			  <div class="col-sm-3 form-group">
				 
				
				<!--remove admin-->
				<div class="row">
				<ul class="cat" style="margin-top:-40px; margin-bottom:40px;">
				<h3>Remove a Customer</h3>
				<?php
				foreach ($all_profile as $key => $value_all) {
					$id = $value_all->user_id;
					$count = count($all_profile);
					$online = $this->session->userdata('user_id');
					if($id != $online )
					{
				?>
				<li style="margin:15px; list-style:none;"><div class="col-sm-12"><img src="<?php echo base_url()?>style="height:40px;" class="img-thumbnail img-responsive"><a href="<?php echo base_url()?>admin/edit_user/<?php echo $value_all->user_id?>"><?php echo $value_all->user_name?> </b></div>
					<div class="col-sm-6 pull-left">
						<a id="<?php echo $id;?>" title="delete" onclick="return confirm('Are you sure want to delete the Profile?');" href="<?php echo base_url()?>admin/delete_user/<?php echo $id;?>" style="color:#a00; margin-left:15px;"> 
							remove 
						</a>
					</div>
				</li>
				<?php
					}
					if($count == 0 )
					{
				?>
						<li style="margin:15px; list-style:none;">
							<h4>No Customer to remove</h4>
						</li>
				<?php
					}		
				}
				?>
				</ul>
				</div>
				
				 
		<?php
			echo form_close();
		?> 
				</div>
			  </div>
			  
				
				</div>
		</div>
</body>
</html>