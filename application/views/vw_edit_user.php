<!DOCTYPE html>
<html lang="en">

				
				 <!-- Main content-->

		
		<?php
		foreach ($profile as  $value2) {
		echo form_open_multipart('admin/profile_update','class="form-horizontal"');
		
		
		  	
							  					
		echo'
			
				<div class="col-xs-10 content">
				<div class="cat">';
		echo'
				<h3>Edit Profile</h3>
				
				
			  <div class="row">
			  <div class="col-sm-9">
			  <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Name:</h4>
				</div>
				<div class="col-sm-8 form-group">
				<input type="hidden" name="user_id" value="'.$value2->user_id.'">
				  <input class="form-control"  name="user_name" value="'.$value2->user_name.'" placeholder="Name" type="text" required>
				</div>
			  </div> 
			    <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Email:</h4>
				</div>
				<div class="col-sm-8 form-group">
				<div class="alert-danger ">';

				 echo form_error('user_username'); 
				 echo'
				  </div>
				  <input class="form-control"  name="user_email" value="'.$value2->user_email.'" placeholder="Email" type="email" required>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Old Password:</h4>
				</div>
				<div class="col-sm-8 form-group">
				  <input class="form-control" id="password" name="user_old_password" placeholder="Password" type="password" required>
				</div>
			  </div> 
			  <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>New Password:</h4>
				</div>
				<div class="col-sm-8 form-group">
				<div class="alert-danger ">';
				 echo form_error('user_password'); 
				 echo'
				</div>
				  <input class="form-control" id="re-pass" name="user_password" placeholder="Password" type="password" required>
				</div>
			  </div> 
			 <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Re-type New Password:</h4>
				</div>
				<div class="col-sm-8 form-group">
				<div class="alert-danger ">';
				echo form_error('user_passconf'); 
				echo'
				</div>
				  <input class="form-control" id="pass-re" name="user_passconf" placeholder="password" type="password" required>
				</div>
			  </div> 
			
			
			  </div> 
			  
			  </div> 
			  
			
			  <div class="col-sm-3 form-group">';
			 ?>
			 
				  <button class="btn btn-success" type="submit" style="width:100%; margin-top:15px;">Update</button>
				</div>
			  </div>
			  
				
				</div>
		</div>
</body>
<?php
}
echo form_close();
?>
</html>