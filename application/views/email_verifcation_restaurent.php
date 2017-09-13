<br />Welcome to Gotakeaway!<br />To finish your registration , there is one more quick step:
					<br />To continue, click below and verify your email address:<br />
					<br /><a href='<?php echo base_url('restaurent_signup/confirm')."/".$rest['id']."/".$rest['activation_code']; ?>' target='_blank'>Click here</a> to verify your email address<br />
					<br />Or you can also copy and paste this link to your browser:</br />
					<br /><?php echo base_url('restaurent_signup/confirm')."/".$rest['id']."/".$customer['activation_code']; ?>
					<br />Thanks for joining 
					<br /><br />
					
					
					<?php echo base_url();?>
