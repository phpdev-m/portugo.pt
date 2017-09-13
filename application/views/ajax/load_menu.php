<?php 
 
 require_once(APPPATH.'libraries/config.php');

$language_data=$this->session->userdata('language');
	if($language_data==''){
    $language_data=array('language' =>'purtgal');
    }
    if(!empty($language_data)){
    $this->lang->load($language_data['language'], $language_data['language']);
    }
 ?>

       <form  class="form-horizontal san" name="register-form" >
      
        <div class="form-group has-feedback">
          <div class="col-md-12 padding">
          
          <h4><?php echo ucfirst($menu['item_name']); ?>.</h4>
   <div class="col-md-12 padding_main">
  <p style=" color:#000; margin:10px 0px;"> Option </p>
  </div>
  <div class="clearfix"></div>
   <div class="col-md-7 padding_main">
    <?php
	//echo '<pre>';
	//print_r($addons);
   foreach($addons as $alladdons)
   {?>
   
    <div class="checkbox checkbox-primary">
                        <input id="<?php echo $alladdons['id']; ?>" class="styled addons" type="checkbox"  value="<?php echo $alladdons['price']; ?>" >
                       
                            <label for="<?php echo $alladdons['id']; ?>">&nbsp;<?php echo ucfirst($alladdons['extra_item']); ?> (+<?php echo $dollar; ?><?php echo $alladdons['price']; ?>)</label>
                        
                    </div>
					<?php } ?>
   
   



 




</div>
</div>
</div>


  <hr />    

<div class="form-group has-feedback">
  <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;">&nbsp;</p>
  </div>
   <div class="col-md-12  padding_main">
   <button class="btn_popup pull-left " data-dismiss="modal" style="margin:5px 0px 0px 0px;" id="cancel_order"><?php echo $this->lang->line('Cancel');?></button>
   <button class="btn_popup pull-right" data-dismiss="modal" style="margin:5px 0px 0px 0px; width:170px;" id="add_menu" type="button"><?php echo $this->lang->line('Add for');?> <?php echo $dollar; ?><font id="total_amount"><?php echo $menu['item_cost']; ?></font></button>
  </div>
 </div>
</div>

</form>

      