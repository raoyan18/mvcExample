<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
	
  <title>Creativeitem Admin</title>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:700,500" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/style.css">
	
</head>

<body>
	<div class="header">
	<div class="row">
	 <!-- Site title -->
	<div class="col-xs-6">
	<h2 style="margin-left:10px; margin-top:8px"><a href="<?php echo base_url(); ?>">Creativeitem</a></h2></div>
	
	 <!-- Profile -->
	
	<div class="col-xs-6">
	<div class="col-xs-11">
	<li class="dropdown pull-right">
		<?php
		$type =  $this->session->userdata('user_type');
		?>
		<a href="<?php echo base_url()?>logout/<?php echo $type;?>"><li><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</li></a>
		</ul>
	</li>
	</div>
							  
							   <!-- Settings -->
					
	</div>
							  
	</div>
	</div>
	
	 <!-- Side bar -->
	 <?php
		
			echo'
		<div class="row container-fluid">
				<div class="col-xs-2 menu">
				<div class="row menu-head">
				<div class="col-sm-4">';
				?>

				</div>
				<div class="col-sm-8">
				Admin
			</h5>
			
				
	
				
				<h6><i class="fa fa-circle" aria-hidden="true" style="color:#2b2; font-size:12px; padding-top:-12px;"> </i> Online</h6> 
				</div>
				</div>
				<ul>
				<a href="<?php echo base_url();?>Admin"><li><h5><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</h5></li></a>
				<a href="<?php echo base_url();?>admin/category"><li><h5><i class="fa fa-list" aria-hidden="true"></i> Category</h5></li></a>
				<a href="<?php echo base_url();?>admin/product"><li><h5><i class="fa fa-newspaper-o" aria-hidden="true"></i> Product</h5></li></a>
			
				</ul>
				</div>
				
				
	<!--dynamic page call starts here-->

	<div class="col-xs-10 content">
		<?php
		if($this->session->flashdata('msg')!='')
		{
			?>
			<div class="alert alert-<?php echo $this->session->flashdata('msg_type');?> alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"
						aria-hidden="true">
					&times;
				</button>
				<?php echo $this->session->flashdata('msg');?>
			</div>
			<?php
		}

				if(isset($vw_dashboard))
				{

				$this->load->view($vw_dashboard);

				}
				else if(isset($vw_category))
				{
				
				$this->load->view($vw_category);
				}
				else if(isset($vw_product))
				{
				
				$this->load->view($vw_product);
				}
				
				else if(isset($vw_add_user))
				{
				
				$this->load->view($vw_add_user);
				}

				else if(isset($vw_edit_user))
				{

				$this->load->view($vw_edit_user);

				}
			
				else
				{
				$this->load->view($vw_dashboard);
				}
			?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
				    function add_fields() {
					    	$(document).ready(function(){

					    		
									 var d = $("#varient_container");

									 var data = "<div class='col-xs-4'>"+
														"<label>Type:</label>"+
														"<input class='form-control'  type='text' placeholder='Type'  name='varient_type[]' value='' />"+
														"</div>"+
														"<div class='col-xs-8'>"+
															"<label>Value:</label>"+
															"<input class='form-control col-sm-4'  placeholder='Use comma to separate..' type='text' name='varient_value[]' value='' />"+
														"</div>";
									d.append(data);
								
					    	});
					 }
 </script>
</body>
</html>