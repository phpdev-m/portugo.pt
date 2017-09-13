<?php 
class Myaccount extends CI_Controller{
	
	
function __construct()
    {
        // Call the Model constructor
     parent::__construct();
	 
	 if(!$this->session->userdata('user_logged_in')){
			redirect('home','refresh');
		}
	 
	 
	 
    $this->load->database();
	$this->load->model('signup_user_model');
	$this->load->model('myaccount_model');
	$this->load->model('order_model');
	$this->load->model('restaurant_model');
	$this->load->model('search_model');
	
	$language_data=$this->session->userdata('language');
	if($language_data==''){
    $language_data=array('language' =>'purtgal');
    }
    if(!empty($language_data)){
    $this->lang->load($language_data['language'], $language_data['language']);
    }
	
	
	
	
	 }
	
	function dashboard()
	{
		
	$session_data=$this->session->userdata('user_logged_in');
	$user_id = $session_data['user_id'];
	$this->data['user'] = $this->myaccount_model->myaccount($user_id);
	
	$this->load->view('myaccount',$this->data);
	
	}
	
	
	function user_detail()
	{
	$user_id = $_POST['user_id'];
	$user_detail=$this->myaccount_model->myaccount($user_id);
	
	?>
    
    <input type="hidden" value="<?php echo $user_id; ?>" id="user_id" />
	
    <div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('First Name');?> *</p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="fname_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your first name');?></p>
   
<input id="firstname" name="firstname" value="<?php echo ucfirst($user_detail['first_name']); ?>" class="form-control" type="text" placeholder="" >
</div>
</div>
</div>

       <div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('Last Name');?> *</p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="lname_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your last name');?></p>
   
<input id="lastname" name="lastname" value="<?php echo ucfirst($user_detail['last_name']); ?>" class="form-control" type="text" placeholder="" >
</div>
</div>
</div>

 <div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('Email Address');?>  *</p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="email_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your email id');?></p>
    <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="valid_email_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type valid email id');?></p>
   
<input id="email" name="email" value="<?php echo $user_detail['email']; ?>" class="form-control" type="text" placeholder="" >
</div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('Phone Number');?>  *</p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="phone_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your phone number');?></p>
   
<input id="phone" name="phone" value="<?php echo $user_detail['phone']; ?>" class="form-control" type="text" placeholder="" >
</div>
</div>
</div>

    
    <?php	
	
	}
	
	
	function edit_user_detail()
	{	
		
	$user_id=$_POST['user_id1'];	
	
	$this->session->set_flashdata('message', 'success');
	$this->myaccount_model->update_user_detail($_POST, $user_id);	
		
	}
	
	
	
	function change_user_password()
	{	
	//print_r($_POST);die;		
	$user_id=$_POST['user_id1'];
	
	$this->session->set_flashdata('password_message', 'change_success');	
	$this->myaccount_model->update_user_password($_POST, $user_id);	
		
	}
	
	
/**************Address Book*******************/

	function address_book()
	{
	$session_data=$this->session->userdata('user_logged_in');
	$user_id = $session_data['user_id'];
	$this->data['address']=$this->myaccount_model->get_address($user_id);
	//print_r($this->data['user']);die;
	$this->load->view('address_book',$this->data);
	
	}
  
	
	function add_address()
	{
	$session_data=$this->session->userdata('user_logged_in');
	$user_id = $session_data['user_id'];
	//
	if(!$_POST){
	$this->load->view('address_book');
	}
	else
	{	
	$this->session->set_flashdata('add_message', 'success_add');	 					
	$this->myaccount_model->insert_address($_POST,$user_id);
	redirect("myaccount/address_book","refresh");
	}
	}
	
    function delete_address()
	  {
	  $id=$this->uri->segment(4);
	  $this->myaccount_model->delete_address($id);
	  redirect("myaccount/address_book","refresh");
	  }
	  
	  
	  
	function myaddress_book()
	{	
	
	$address_id = $_POST['address_id'];
	$address=$this->myaccount_model->address_get($address_id);	
	?>
	
    <input type="hidden" value="<?php echo $address_id; ?>" id="address_id" />
    
    <div class="form-group has-feedback" style="display:none">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3"><?php echo $this->lang->line('Full Name');?>:</p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="fname1_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your full name');?></p>
 
  <input id="fname" name="fname" value="<?php echo ucwords($address['address_tittle']); ?>" class="form-control2" type="text" placeholder="" >
  <p class="inpu_text4"><?php echo $this->lang->line('House name/number and street,P.O.box,company name c/o');?></p>
  </div>
</div>
</div>


  <div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3"><?php echo $this->lang->line('Address Line');?> 1:<br /><span>(<?php echo $this->lang->line('or');?>&nbsp;<?php echo $this->lang->line('company');?>&nbsp;<?php echo $this->lang->line('name');?>)</span></p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="address2_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i>Please type your address</p>
  
 <input id="address1" name="apartment" value="<?php echo ucfirst($address['apartment']); ?>" class="form-control2" type="text" placeholder="" >
 <p class="inpu_text4"><?php echo $this->lang->line('Apartment, suite, unit, building, floor,etc');?></p>
 </div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3"><?php echo $this->lang->line('Address Line 2');?>:<br /><span>(<?php echo $this->lang->line('Optional');?>)</span></p></div>
 <div class="col-lg-9 padding_three"> 
 <input id="address" name="address" value="<?php echo ucfirst($address['address']); ?>" class="form-control2" type="text" placeholder="" >
 </div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3"><?php echo $this->lang->line('Town/City');?>:</p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="city1_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your city');?></p>
  
 <input id="city1" name="city" value="<?php echo ucfirst($address['city']); ?>" class="form-control2" type="text" placeholder="" >
 </div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3"><?php echo $this->lang->line('Postcode');?>:</p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="postcode1_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your postcode');?></p>
  
 <input id="postcode" name="postcode" value="<?php echo ucfirst($address['zip_code']); ?>" class="form-control2" data-masked-input="9999-999" maxlength="8" type="text" placeholder="" >
 </div>
</div>
</div>
	
  <?php  
    	
	}
	
	
 function edit_address_bood()
	{	
		
	$address_id=$_POST['id1'];
	
	//$this->session->set_flashdata('message', 'success');
	$this->session->set_flashdata('add_message', 'success_add');
	$this->myaccount_model->update_address($_POST, $address_id);	
		
	}

   function primary_address()
	{		
	$session_data=$this->session->userdata('user_logged_in');
	$user_id = $session_data['user_id'];
	$primary_address = $this->myaccount_model->get_primary_address($user_id);
	
	foreach($primary_address as $address){	
	if(!empty($address)){
	$this->order_model->update_alladdress($address['id']);		
	}	
	}
	
	$this->myaccount_model->update_address_book($_POST['address_id'],$_POST['status']);
	}
	
	
/*****************Favourite*******************/		
	
function favourite_restaurant()
 {
  
 $session_data=$this->session->userdata('user_logged_in');
 $user_id = $session_data['user_id'];
 $this->data['fav_restaurant']=$this->restaurant_model->get_fav_restaurant($user_id); 
 $this->load->view('favourite_restaurant',$this->data);
 
 }
	
	function favourite_dish()
	{
		
	$session_data=$this->session->userdata('user_logged_in');
	$user_id = $session_data['user_id'];
	$this->data['fav_dish']=$this->restaurant_model->get_favourite_dish($user_id); 
	$this->load->view('favourite_dish',$this->data);
	
	}
	
	
	/*****************Order*******************/		
	
	function user_order()
	{
	
	
	$session_data=$this->session->userdata('user_logged_in');
	$user_id = $session_data['user_id'];
	

	$this->data['all_orders']=$this->order_model->get_all_orders($user_id);	


	$this->load->view('user_order', $this->data);
	
	}
	
	function view_order()
	{
		
	$session_data=$this->session->userdata('user_logged_in');
	$user_id = $session_data['user_id'];

	$id=$this->uri->segment(3);
	$this->data['order']=$this->order_model->get_order($id);
	$this->data['order_detail']=$this->order_model->get_order_detail($id);
	$this->load->view('user_view_order',$this->data);
	
	}
	
	/*****************payment method*****************/
	function payment_method()
	{
		
	$session_data=$this->session->userdata('user_logged_in');
	$user_id = $session_data['user_id'];
	
	$this->load->view('user_payment_method');
	}	
	
	
	
}

?>
