<?php

class Mdl_admin extends CI_Model {


	public function validate($username, $enc_password)
	{
		
		$query = $this->db->get_where('user',array('user_email'=>$username,'user_password'=>$enc_password));
		if($query->num_rows()>0)
		{
		    //##set session variable according to the user type
           foreach ($query->result_array() as $a => $b) {
           		if($b['user_type']=="user"){
           		  $this->session->set_userdata(array(
                        'user_id' => $b['user_id'],
                        'user_username' => $b['user_email'],
                        'user_name' => $b['user_name'],
                        'user_type' => $b['user_type'],
                        'user_logged_in' => true
                    )
                   );	
           		}
           		else {
           			  $this->session->set_userdata(array(
                        'admin_id' => $b['user_id'],
                        'admin_username' => $b['user_email'],
                        'admin_name' => $b['user_name'],
                        'user_type' => $b['user_type'],
                        'admin_logged_in' => true
                    )
                   );
           		}
              
               
            }

            return $query;
		}
		
	}

	//## query for user profile add
	public function profile_add($user_name,$enc_password,$email,$designation)
	{
		$attr  = array(	
			'user_name' => $user_name,
			'user_password' => $enc_password,	
			'user_email' => $email,
			'user_type' => $designation,		
			);

		
		$query = $this->db->insert('user',$attr);
		
		if($query)
		{
			
			return 1;
					}
		else
		{
			return 0;
		}	
	}


    //## load all user data
	public function all_profile()
	{
		$query = $this->db->get_where('user',array('user_type'=>"user"));
		if($query)
		{
			return $query->result();
		}


	}

	//## load a particular user profile
	public function load_profile($id)
	{
		$query = $this->db->get_where('user',array('user_id'=>$id));
		if($query)
		{
			return $query->result();
		}

	}

	//## delete a user or admin
	public function delete_admin($id)
	{
	
		$this->db->where('user_id', $id);
		$delete = $this->db->delete('user');
		if ($this->db->affected_rows() > 0)
	   	{
	   		 return 1;
	   	}
	}
	//##customer edit
	public function profile_edited($id,$user_name,$enc_password,$email,$enc_old_password)
	{

        $query = $this->db->get_where('user',array('user_id'=>$id,'user_password'=>$enc_old_password));
		if($query->num_rows()>0)
		{
				
			$attr  = array(	
			'user_name' => $user_name,
			'user_password' => $enc_password,	
			'user_email' => $email,
				
			);

			$this->db->where('user_id',$id);
			$query = $this->db->update('user',$attr);
		
			if($query)
			{
				$query2 = $this->db->get('user');
				return $query2->result();
			}
			else
			{
				return 0;
			}

		}
		else
		{
			return 1;
		}
		
	
	}
	
	//## Category
	public function cat_insert()
	{
		$category_name = $this->input->post('category_name');
		

		$attr = array(
			'category_name' => $category_name,
		

			);
		$query = $this->db->insert('category',$attr);
		if($query)
		{
			return 1;
		}
		else
		{
			return false;
		}

	}

    public function all_category()
    {
        $query = $this->db->get('category');
        return $query->result();
    }
	
    // ## Category Update
    public function cat_update()
    {
        $id = $this->input->post('category_id');
        $category_name = $this->input->post('category_name');

        $attr = array(
            'category_name' => $category_name,
				);
			$this->db->where('category_id',$id);
			$query = $this->db->update('category',$attr);
			if($query)
			{
				return 1;
			}
			else
			{
				return false;
			}
    }
    //##delete category
	public function delete_cat($id) 
	{
	    $this->db->where('category_id', $id);
	   	$query = $this->db->delete('category');
	   	if ($this->db->affected_rows() > 0)
	   	{
	   		 return 1;
	   	}
    }
   // ## product

    function print_array($array){
    	echo '<pre>';
    	print_r($array);
    	echo '</pre>';
    }
    
   	public function product_insert()
	{
		$time = date("Y-m-d");
		
		$product_title = $this->input->post('product_title');
		$product_description= $this->input->post('product_description');
		$product_category_fkey = $this->input->post('product_category_fkey');
		$product_stock_quantity= $this->input->post('product_stock_quantity');
		$product_purchase_price= $this->input->post('product_purchase_price');
		$product_selling_price= $this->input->post('product_selling_price');
	//create a json array for variant
		$varient =[];
		$varient_type = $this->input->post('varient_type');
		$varient_value = $this->input->post('varient_value');

		for($i =0;$i<count($varient_type);$i++){
			$value = explode(',',$varient_value[$i]);
			for($j = 0 ;$j<count($value);$j++){
				$value[$j] = trim($value[$j]);
			}
			$varient[$varient_type[$i]]  = $value;

		}

		$product_varient = json_encode($varient);
		

		$attr = array(
			'product_title' => $product_title,
			'product_description' => $product_description,
			'product_category_fkey' => $product_category_fkey,
			'product_stock_quantity' => $product_stock_quantity,
			'product_purchase_price' => $product_purchase_price,
			'product_selling_price' => $product_selling_price,
			'product_varient' => $product_varient,
		
        );
		$this->db->set('product_date_added', 'NOW()', FALSE);
		$query = $this->db->insert('product',$attr);
		if($query)
		{
			return 1;
		}
		else
		{
			return false;
		}

	}

	// ## product update
    public function product_updated()
    {
        $id = $this->input->post('product_id');
        $product_title = $this->input->post('product_title');
        $product_description = $this->input->post('product_description');
        $product_category_fkey = $this->input->post('product_category_fkey');
        $product_stock_quantity = $this->input->post('product_stock_quantity');
        $product_purchase_price = $this->input->post('product_purchase_price');
        $product_selling_price = $this->input->post('product_selling_price');

        $attr  = array(
            'product_description' => $product_description,
            'product_title' => $product_title,
            'product_category_fkey' => $product_category_fkey,
            'product_stock_quantity' => $product_stock_quantity,
            'product_purchase_price' => $product_purchase_price,
            'product_selling_price' => $product_selling_price,
        );

			$this->db->where('product_id',$id);
			$query = $this->db->update('product',$attr);
		
			if($query)
			{
				$query2 = $this->db->get('product');
				return $query2->result();
			}
			else
			{
				return 0;
			}

    }

	public function load_product()
	{
		$this->db->order_by('product_id','DESC');
		$query =$this->db->get('product');
		if($query)
		{
			return $query->result();
		}
	}
	public function load_product_page($per_page,$offset)
	{
		$page = ($offset-1)*$per_page;
		$this->db->order_by('product_id','DESC');
		$this->db->limit($per_page,$page);
		$query =$this->db->get('product');
		if($query)
		{
			return $query->result();
		}
	}
	public function delete_product($id)
	{
		$query=$this->db->get_where('product',array('product_id' =>$id,));
		if($query)
		{
			$result=$query->result();
			foreach ($result as $value) 
			{
				if(file_exists($value->product_photo))
					{
						unlink($value->product_photo);

					}
			}
			
		}
		$this->db->where('product_id', $id);
		$delete = $this->db->delete('product');
		if ($this->db->affected_rows() > 0)
	   	{
	   		 return 1;
	   	}
		else
		{
			return 'x';
		}
	}

}