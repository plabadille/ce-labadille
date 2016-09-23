<?php
global $wpdb;

//get options
$wpc_munber_of_images= get_option('wpc_munber_of_images');
$wpc_controls= get_option('wpc_controls');
$wpc_pagination= get_option('wpc_pagination');
$wpc_slide_speed= get_option('wpc_slide_speed');
$wpc_navigation_text_next= get_option('wpc_navigation_text_next');
$wpc_navigation_text_prev= get_option('wpc_navigation_text_prev');

//set options if options are null
if($wpc_munber_of_images == ''){ $wpc_munber_of_images= 5;}
if($wpc_controls == ''){ $wpc_controls= true;}
if($wpc_pagination == ''){ $wpc_pagination= true;}
if($wpc_slide_speed == ''){ $wpc_slide_speed= 1000;}
if($wpc_navigation_text_next == ''){ $wpc_navigation_text_next= '>';}
if($wpc_navigation_text_prev == ''){ $wpc_navigation_text_prev= '<';}

//sanitize all post values
$add_opt_submit= sanitize_text_field( $_POST['add_opt_submit'] );
if($add_opt_submit!='') { 
    
	$wpc_munber_of_images= sanitize_text_field( $_POST['wpc_munber_of_images'] );
	$wpc_controls= sanitize_text_field( $_POST['wpc_controls'] );
	$wpc_pagination= sanitize_text_field( $_POST['wpc_pagination'] );
	$wpc_slide_speed= sanitize_text_field( $_POST['wpc_slide_speed'] );
	$wpc_navigation_text_next= sanitize_text_field( $_POST['wpc_navigation_text_next'] );
	$wpc_navigation_text_prev= sanitize_text_field( $_POST['wpc_navigation_text_prev'] );
	$saved= sanitize_text_field( $_POST['saved'] );


    if(isset($wpc_munber_of_images) ) {
		update_option('wpc_munber_of_images', $wpc_munber_of_images);
    }
	
	if(isset($wpc_controls) ) {
		update_option('wpc_controls', $wpc_controls);
    }
	 if(isset($wpc_pagination) ) {
		update_option('wpc_pagination', $wpc_pagination);
    }
	if(isset($wpc_slide_speed) ) {
		update_option('wpc_slide_speed', $wpc_slide_speed);
    }
	if(isset($wpc_navigation_text_next) ) {
		update_option('wpc_navigation_text_next', $wpc_navigation_text_next);
    }
	if(isset($wpc_navigation_text_prev) ) {
		update_option('wpc_navigation_text_prev', $wpc_navigation_text_prev);
    }
	if($saved==true) {
		
		$message='saved';
	} 
}
  
?>
  <?php
        if ( $message == 'saved' ) {
		echo ' <div class="added-success"><p><strong>Settings Saved.</strong></p></div>';
		}
   ?>
   
    <div class="wrap netgo-facebook-post-setting">
        <form method="post" id="settingForm" action="">
		<h2><?php _e('WooCommerce Product Carousel Settings','');?></h2>
		<table class="form-table">
		<tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="wpc_munber_of_images"><?php _e('Number of images to show','');?></label>
			</th>
			<td><input type="text" name="wpc_munber_of_images" size="10" value="<?php echo $wpc_munber_of_images; ?>" />
		
			</td>
		</tr>
	
	    <tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="wpc_munber_of_images"><?php _e('Controls','');?></label>
			</th>
			<td>
			<select style="width:120px" name="wpc_controls" id="wpc_controls">
			<option value='true' <?php if($wpc_controls == 'true') { echo "selected='selected'" ; } ?>>True</option>
			<option value='false' <?php if($wpc_controls == 'false') { echo "selected='selected'" ; } ?>>False</option>
		   </select>
		   <br />
		   <em><?php _e('Show Left, Right arrow button.', ''); ?></em>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="wpc_pagination"><?php _e('Pagination','');?></label>
			</th>
			<td>
			<select style="width:120px" name="wpc_pagination" id="wpc_pagination">
			<option value='true' <?php if($wpc_pagination == 'true') { echo "selected='selected'" ; } ?>>True</option>
			<option value='false' <?php if($wpc_pagination == 'false') { echo "selected='selected'" ; } ?>>False</option>
		   </select>
		   <br />
		   <em><?php _e('Show pagination.', ''); ?></em>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="wpc_slide_speed"><?php _e('Slide Speed','');?></label>
			</th>
			<td>
			<input type="text" name="wpc_slide_speed" size="10" value="<?php echo $wpc_slide_speed; ?>" />
		   <br />
		   <em><?php _e('Slide Speed in millisecond. (Ex: 1000)', ''); ?></em>
			</td>
		</tr>
	    <tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="wpc_slide_speed"><?php _e('Navigation Text','');?></label>
			</th>
			<td>
			Prev: <input type="text" name="wpc_navigation_text_prev" size="10" value="<?php echo $wpc_navigation_text_prev; ?>" />
		    <br />
		   Next:  <input type="text" name="wpc_navigation_text_next" size="10" value="<?php echo $wpc_navigation_text_next; ?>" />
			</td>
		</tr>
		<tr>
		  <td>
		  <p class="submit">
		<input type="hidden" name="saved"  value="saved"/>
        <input type="submit" name="add_opt_submit" class="button-primary" value="Save Changes" />
		  <?php if(function_exists('wp_nonce_field')) wp_nonce_field('add_opt_submit', 'add_opt_submit'); ?>
        </p></td>
		</tr>
		</table>
		
        
       </form>
      
    </div>

