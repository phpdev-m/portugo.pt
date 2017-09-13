<br />Welcome to Gotakeaway!<br />
					<br />Name of restaurant: <?php echo ucwords($data['rest_name']); ?></br />
					<br />Name: <?php echo ucwords($data['first_name'].'&nbsp;'.$data['last_name']); ?></br />
					<br />Email: <?php echo $data['email']; ?></br />
					
					<br />Message: <?php echo ucfirst($data['message']); ?></br />
					
					<br /><br />
					
					
					<?php echo base_url();?>
