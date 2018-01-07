<!DOCTYPE html>
<html lang="en">
	
				 <!-- Main content-->
			
				<div class="col-xs-10 content">
				<div class="cat">
				<h3>Add a product</h3>
			  <div class="row">
			  <div class="col-sm-8" style="padding-right:25px;">
			<?php
				 echo form_open_multipart('admin/product_publish');
			?>
			  <div class="row">
					<div class="col-sm-3 form-group">
					  <h4>Title</h4>
					</div>
					<div class="col-sm-9 form-group">
					  <input class="form-control" id="name" name="product_title" placeholder="Title" type="text" required>
					</div>
			  </div> 
			  
			  <div class="row">
					<div class="col-sm-3 form-group">
					  <h4>Description</h4>
					</div>
					<div class="col-sm-9 form-group">
					  <textarea  class="form-control" id="name" name="product_description" placeholder="content" type="text"  rows="6"> </textarea><br>
					</div>
			  </div> 
			  
	
			  <div class="row">
					<div class="col-sm-3 form-group">
					  <h4>Select category</h4>
					</div>
					<div class="col-sm-9 form-group">
					    <select name="product_category_fkey" style="width:100%;margin-top:10px; padding:3px 10px;">
					    <option value="" style="display:none">Select Category</option>
				<?php
				foreach ($category as $value) {
					echo '<option value="'.$value->category_id.'" >'.$value->category_name.'</option>';
				}
						  
				?>		  
						</select>
					</div>
			  </div> 

			   <div class="row">
					<div class="col-sm-3 form-group">
					  <h4>Stock Quantity</h4>
					</div>
				
					<div class="col-sm-9 form-group">
					  <input class="form-control" id="name" name="product_stock_quantity" placeholder="Stock Quantity" type="number" required>
					</div>
			  </div> 
			  
			<div class="row">
					<div class="col-sm-3 form-group">
					  <h4>Purchace Price</h4>
					</div>
				
					<div class="col-sm-9 form-group">
					  <input class="form-control" id="name" name="product_purchase_price" placeholder="Perchace Price" type="text" required>
					</div>
			  </div> 
			
			<div class="row">
					<div class="col-sm-3 form-group">
					  <h4>Selling Price</h4>
					</div>
				
					<div class="col-sm-9 form-group">
					  <input class="form-control" id="name" name="product_selling_price" placeholder="Selling Price" type="text" required>
					</div>
			  </div> 

			<div class="row">
					<div class="col-sm-3 form-group">
					  <h4>Product Variant</h4>
					</div>
					<div  class="col-sm-9 form-group">
						<div id="varient_container" class="row">
							
						</div>
		  			</div>

			 </div> 
			 <div class="col-sm-9 form-group">
				<input class="btn btn-warning"  type="button" id="more_fields" onclick="add_fields();" value="Add varient" />
				</div>			 
			  	<div class="row">
			  <button class="btn btn-primary pull-right" type="submit" style=" margin-top:15px;"> Publish </button>
			  </div>
			 <?php
		echo form_close();
		?>
			  </div>
			  
			   <!-- Showing all product titles-->
			  <div class="col-sm-4 form-group" style="padding-left:15px; border-left:1px dotted #ccc;">
			  <h3 style="margin-top:-25px; margin-bottom:15px; margin-left:10px;"class="col-sm-11">All product</h3>
		<?php
		foreach ($product as $value1) {
				$id=$value1->product_id;
				echo'<div class="row" style="padding:20px 0px 0px ">
					<div class="col-xs-11">
					<a href="#product_'.$id.'" data-toggle="modal" data-target="#product_'.$id.'"><h4 class="cont-head">'.$value1->product_title.'</h4></a>
					</div>
					<div class="col-xs-1">';
					?>
					 <a id="<?php echo $id;?>" style="color:red;"title="delete" onclick="return confirm('Are you sure want to delete this product?');" href="<?php echo base_url()?>admin/product_delete/<?php echo $id;?>">  x </a>
					
					</div>
					</div>
		<?php
		}
					
		?>					
						<?php echo $this->pagination->create_links(); ?>
								
							
									
				</div>
			  </div>
			  
			  
			  <!--MODAL-->
						<?php
		foreach ($product as $value2)
		 {
		 	$id = $value2->product_id;
		 	$product_category = $value2->product_category_fkey;
			
			
		 	echo form_open_multipart('admin/update_product');
		 	echo'
		 	<input type ="hidden" value = "'.$value2->product_id.'" name="product_id">
			<div id="product_'.$value2->product_id.'" class="modal fade " role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									
									<h4 class="modal-title black1">'.$value2->product_title.'</h4>
								  </div>
								  <div class="modal-body">
								    
				<div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Headline</h4>
				</div>';
			
				 
			
				echo'<div class="col-sm-9 form-group">
				  <input class="form-control" id="name" name="product_title" placeholder="Name" type="text" required value="'.$value2->product_title.'">
				</div>
			  </div> 
			  
			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Description</h4>
				</div>
				<div class="col-sm-9 form-group">
				  <textarea  class="form-control" id="name" name="product_description" placeholder="Description" type="text"  rows="5"> '.$value2->product_description.'</textarea><br>
				</div>
			  </div> 
			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Stock Quantity</h4>
				</div>
				<div class="col-sm-9 form-group">
				  <input class="form-control" id="name" name="product_stock_quantity" placeholder="Name" type="text" required value="'.$value2->product_stock_quantity.'">
				</div>
				</div>
				<div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Purchace Price</h4>
				</div>
				<div class="col-sm-9 form-group">
				  <input class="form-control" id="name" name="product_purchase_price" placeholder="Name" type="text" required value="'.$value2->product_purchase_price.'">
				</div>

		</div>
		  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Selling Price</h4>
				</div>
				<div class="col-sm-9 form-group">
				  <input class="form-control" id="name" name="product_selling_price" placeholder="Name" type="text" required value="'.$value2->product_selling_price.'">
				</div>
				</div>

			  </div> 

			   <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Product Varient</h4>
				</div>
				<div class="col-sm-9 form-group">';
				$varient = json_decode($value2->product_varient);
				

				    foreach ($varient as $key => $value){
				        
				        echo'<div class="col-sm-9 form-group">
				        <label> '."$key: ".implode(",",$value) ." ".'</label>
				        </div>';
				    }

				
				echo'
				  
				</div>
				</div>

			 

			  ';
			  
			  
			echo'  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Select category</h4>
				</div>
				<div class="col-sm-9 form-group">
				    <select name="product_category_fkey" style="width:100%;margin-top:10px; padding:3px 10px;">';
	foreach ($category_name as $value_cat)
										{
										echo'  <option value="'.$value_cat->category_id.'" style="display:none">'.$value_cat->category_name.'</option>';
										}		
	foreach ($category as $value) {
				echo '<option value="'.$value->category_id.'" >'.$value->category_name.'</option>';
			}
					  
			echo'
					  
					</select>
				</div>
			  </div> 
			  <div class="row">
				<div class="col-sm-5 form-group">';
				?>
			  
				</div>
			    </div>
			  
			  
			  <button type="submit" class="btn btn-success category-h" title="add category">Update</button>
			 
								 
			
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								  </div>
								</div>

							  </div>
							</div>
				
				</div>
				<?php
				echo form_close();
					}
				
				?>	
		</div>
</body>
</html>